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
        Category::factory()
            ->count(100)
            ->make()
            ->each(function (Product $product) use ($categories) {
                $product->category_id = $categories->random()->id;
                $product->save();
            });
    }
}
