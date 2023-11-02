<?php

namespace App\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait TenantModels
{
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new TenantScope());
        static::creating(function (Model $obj) {
            $companyId = Auth::user()->company_id;
            $obj->company_id = $companyId;
        });
    }
}
