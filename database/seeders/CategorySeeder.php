<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Clothes',
            'slug' => 'clothes',
            'category_image' => 'clothes.jpg',
            'short_description' => 'Clothing for men, women, and kids',
            'long_description' => 'A wide range of clothes including casual, formal, and sportswear.',
            'status' => 'Active'
        ]);

        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'category_image' => 'electronics.jpg',
            'short_description' => 'Latest electronic gadgets and devices',
            'long_description' => 'Shop the best gadgets like mobiles, laptops, TVs, and more.',
            'status' => 'Active'
        ]);
    }
}

