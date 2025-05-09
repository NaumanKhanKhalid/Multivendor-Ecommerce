<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductVariationAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variation_attributes')->insert([
            // TSHIRT-RED-SMALL
            ['product_variation_id' => 1, 'attribute_id' => 1, 'attribute_value_id' => 1], // Color: Red
            ['product_variation_id' => 1, 'attribute_id' => 2, 'attribute_value_id' => 3], // Size: Small
        
            // TSHIRT-BLUE-LARGE
            ['product_variation_id' => 2, 'attribute_id' => 1, 'attribute_value_id' => 2], // Color: Blue
            ['product_variation_id' => 2, 'attribute_id' => 2, 'attribute_value_id' => 4], // Size: Large
        ]);
        
    }
}
