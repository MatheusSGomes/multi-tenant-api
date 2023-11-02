<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, TenantModels;
    protected $fillable = ['name'];
    protected $table = 'categories';
}
