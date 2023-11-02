<?php

namespace App\Tenant;

use App\Models\Company;
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

    /**
     * Criar um relacionamento com company para todos os models
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
