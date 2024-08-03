<?php

namespace App\Http\Controllers;

use App\Enums\CartUpdateType;
use App\Enums\TableStatus;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function __construct(public Cart $cart) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->product_id);

        $table = Table::findOrFail($request->table_id);

        $tableState = $table->closeOrOpenState()->first();

        if ($tableState->status->is(TableStatus::CLOSE)) {
            $tableState->update([
                'status' => TableStatus::OPEN,
            ]);
        }

        $cart = $this->cart->where('table_state_id', $tableState->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cart !== null) {
            $cart->increment('quantity', $request->quantity);

            return back()->with('success', __('words.messages.success.cart.updated'));
        }

        $this->cart->create([
            'table_state_id' => $tableState->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price,
        ]);

        return back()->with('success', __('words.messages.success.cart.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart): RedirectResponse
    {
        if (CartUpdateType::from($request->type)->is(CartUpdateType::DECREMENT)) {
            if ($cart->quantity === 1) {
                return $this->destroy($cart);
            }

            $cart->decrement('quantity');

            return back()->with('success', __('words.messages.success.cart.updated'));
        }

        $cart->increment('quantity');

        return back()->with('success', __('words.messages.success.cart.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart): RedirectResponse
    {
        $cartCount = $this->cart->where('table_state_id', $cart->table_state_id)->count();

        if ($cartCount === 1) {
            $cart->tableState()->update([
                'status' => TableStatus::CLOSE,
            ]);

            $cart->delete();

            return back()->with('success', __('words.messages.success.cart.deleted'));
        }

        $cart->delete();

        return back()->with('success', __('words.messages.success.cart.deleted'));
    }
}
