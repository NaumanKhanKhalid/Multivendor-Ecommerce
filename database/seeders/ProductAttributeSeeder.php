<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_attributes')->insert([
            ['product_id' => 1, 'attribute_id' => 1], // Color
            ['product_id' => 1, 'attribute_id' => 2], // Size
        ]);
        
    }
}
