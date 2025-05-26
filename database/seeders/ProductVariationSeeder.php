<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variations')->insert([
            ['product_id' => 1, 'sku' => 'TSHIRT-RED-SMALL', 'price' => 12.00, 'stock' => 50,'image'=>'', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'sku' => 'TSHIRT-BLUE-LARGE', 'price' => 14.00, 'stock' => 30, 'image'=>'','status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
