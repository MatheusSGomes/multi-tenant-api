<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(10)
            ->make()
            ->each(function (Category $category) {
                $category->company_id = 1;
                $category->save();
            });

        Category::factory()
            ->count(10)
            ->make()
            ->each(function (Category $category) {
                $category->company_id = 2;
                $category->save();
            });
    }
}
