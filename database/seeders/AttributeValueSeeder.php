<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attribute_values')->insert([
            ['attribute_id' => 1, 'value' => 'Red', 'slug' => 'red', 'created_at' => now(), 'updated_at' => now()],
            ['attribute_id' => 1, 'value' => 'Blue', 'slug' => 'blue', 'created_at' => now(), 'updated_at' => now()],
            ['attribute_id' => 2, 'value' => 'Small', 'slug' => 'small', 'created_at' => now(), 'updated_at' => now()],
            ['attribute_id' => 2, 'value' => 'Large', 'slug' => 'large', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
