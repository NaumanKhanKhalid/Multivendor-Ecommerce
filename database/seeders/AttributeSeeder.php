<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([
            ['name' => 'Color', 'slug' => 'color', 'type' => 'select', 'status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Size', 'slug' => 'size', 'type' => 'select', 'status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
