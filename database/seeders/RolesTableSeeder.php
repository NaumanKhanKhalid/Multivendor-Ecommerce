<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert roles data
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator with full access to manage the entire system.'
        ]);

        Role::create([
            'name' => 'Vendor',
            'slug' => 'vendor',
            'description' => 'Vendor who can manage their own products and view their own orders.'
        ]);

        Role::create([
            'name' => 'Customer',
            'slug' => 'customer',
            'description' => 'Customer with access to browse products and place orders.'
        ]);
    }
}
