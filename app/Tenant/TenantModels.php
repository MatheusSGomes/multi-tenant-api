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
            $company = \Tenant::getTenant();
            //$companyId = Auth::user()->company_id;
            if ($company) {
                $obj->company_id = $company->id;
            }
        });
    }
}
