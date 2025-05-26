<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'T-Shirt', 'slug' => 't-shirt', 'long_description' => 'Basic T-shirt', 'price' => 10.00, 'type' => 'variable','sku' =>'T-shirt', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
