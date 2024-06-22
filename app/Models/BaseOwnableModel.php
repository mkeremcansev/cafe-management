<?php

namespace App\Models;

use App\Models\Scopes\ByUserScope;
use App\Traits\ByUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseOwnableModel extends Model
{
    use ByUser;

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new ByUserScope());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
