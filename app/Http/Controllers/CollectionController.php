<?php

namespace App\Http\Controllers;

use App\Enums\CartStatus;
use App\Enums\CollectionType;
use App\Enums\TableStatus;
use App\Http\Requests\StoreCollectionRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Table;
use App\Services\MoneyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function __construct(public Cart $cart) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request): RedirectResponse
    {
        $type = $request->type;
        $method = $request->method;

        $table = Table::findOrFail($request->table_id);

        $tableState = $table->openState()->first();

        $cartTotalPrice = $tableState->carts->moneySum('total_price');

        if ($tableState === null || $cartTotalPrice->isZero()) {
            return back()->with('error', __('words.messages.error.validations.general_error'));
        }

        if (CollectionType::from($type)->is(CollectionType::MANUEL)) {
            $amount = MoneyService::ofMinor($request->amount)->plus($tableState->collections->moneySum('amount'));

            if ($amount->isGreaterThan($cartTotalPrice)) {
                return back()->with('error', __('words.messages.error.validations.high_amount'));
            }

            if ($amount->isEqualTo($cartTotalPrice)) {
                $table->carts()->update([
                    'carts.status' => CartStatus::COLLECTED,
                ]);

                $tableState->update([
                    'status' => TableStatus::COLLECTED,
                ]);

                $table->closeState()->create();
            }

            $table->carts()->update([
                'carts.is_before_collection' => true,
            ]);

            $tableState->collections()->create([
                'amount' => $request->amount,
                'method' => $method,
                'type' => $type,
            ]);

            return back()->with('success', __('words.messages.success.collection.created'));
        }
        if (CollectionType::from($type)->is(CollectionType::PRODUCT_COLLECTION)) {
            DB::beginTransaction();
            $totalCollectionAmount = MoneyService::zero();

            $collectionDetails = [];

            foreach ($request->products as $product) {
                $quantity = $product['quantity'];

                $product = Product::findOrFail($product['product_id']);

                $cartItem = $table->carts()->where('product_id', $product->id)->first();

                if ($cartItem === null || $cartItem->quantity < $quantity) {
                    DB::rollBack();

                    return back()->with('error', __('words.messages.error.validations.product_quantity_greater_than_cart'));
                }

                $totalProductCollectionAmount = $product->price->multipliedBy($quantity);

                $totalCollectionAmount = $totalCollectionAmount->plus($totalProductCollectionAmount);

                $collectionDetails[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price->getMinorAmount(),
                    'total_price' => $totalProductCollectionAmount->getMinorAmount(),
                ];
            }

            $totalCollectionAmountWithCollectedAmount = $totalCollectionAmount->plus($tableState->collections->moneySum('amount'));

            if ($totalCollectionAmountWithCollectedAmount->isGreaterThan($cartTotalPrice)) {
                DB::rollBack();

                return back()->with('error', __('words.messages.error.validations.high_amount'));
            }

            if ($totalCollectionAmountWithCollectedAmount->isEqualTo($cartTotalPrice)) {
                $table->carts()->update([
                    'carts.status' => CartStatus::COLLECTED,
                ]);

                $tableState->update([
                    'status' => TableStatus::COLLECTED,
                ]);

                $table->closeState()->create();
            }

            $table->carts()->update([
                'carts.is_before_collection' => true,
            ]);

            $collection = $tableState->collections()->create([
                'amount' => $totalCollectionAmount->getMinorAmount(),
                'method' => $method,
                'type' => $type,
            ]);

            $collection->details()->createMany($collectionDetails);

            DB::commit();

            return back()->with('success', __('words.messages.success.collection.created'));
        }

        return back()->with('error', __('words.messages.error.general_error'));

    }
}
