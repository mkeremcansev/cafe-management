<?php

namespace App\Models;

use App\Models\Scopes\ByCompanyScope;
use App\Traits\ByUserAndCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaseOwnableModel extends Model
{
    use ByUserAndCompany;

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new ByCompanyScope());
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
