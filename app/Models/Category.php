<?php

namespace App\Models;

use App\Tenant\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'categories';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenantScope());
    }
}
