<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        Product::factory()
            ->count(20)
            ->make()
            ->each(function (Product $product) use ($categories) {
                $tenantId = rand(1, 2);
                $categoryId = $categories->where('company_id', $tenantId)->random()->id;
                $product->category_id = $categoryId;
                $product->company_id = $tenantId;
                $product->save();
            });
    }
}
