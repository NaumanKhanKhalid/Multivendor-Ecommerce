<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        SubCategory::create([
            'category_id' => 1,  // Linking to 'Clothes' category
            'name' => 'T-Shirts',
            'slug' => 't-shirts',
            'subcategory_image' => 'tshirts.jpg',
            'short_description' => 'Comfortable and stylish T-shirts for everyone',
            'long_description' => 'A wide variety of T-shirts in different colors, designs, and sizes.',
            'status' => 'Active'
        ]);

        SubCategory::create([
            'category_id' => 2,  // Linking to 'Electronics' category
            'name' => 'Smartphones',
            'slug' => 'smartphones',
            'subcategory_image' => 'smartphones.jpg',
            'short_description' => 'Latest and best smartphones in the market',
            'long_description' => 'Shop the newest mobile phones with top-notch features and specifications.',
            'status' => 'Active'
        ]);
    }
}
