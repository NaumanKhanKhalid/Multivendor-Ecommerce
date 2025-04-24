<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert permissions data
        Permission::create([
            'name' => 'Create Product',
            'slug' => 'create-product',
            'description' => 'Allows the user to create a new product.',
        ]);

        Permission::create([
            'name' => 'Edit Product',
            'slug' => 'edit-product',
            'description' => 'Allows the user to edit product details.',
        ]);

        Permission::create([
            'name' => 'Delete Product',
            'slug' => 'delete-product',
            'description' => 'Allows the user to delete a product.',
        ]);

        Permission::create([
            'name' => 'View Orders',
            'slug' => 'view-orders',
            'description' => 'Allows the user to view orders.',
        ]);

        Permission::create([
            'name' => 'Create Order',
            'slug' => 'create-order',
            'description' => 'Allows the user to place a new order.',
        ]);

        Permission::create([
            'name' => 'Manage Users',
            'slug' => 'manage-users',
            'description' => 'Allows the user to manage customers and vendors.',
        ]);

        Permission::create([
            'name' => 'Manage Vendor Products',
            'slug' => 'manage-vendor-products',
            'description' => 'Allows the user to manage their own products.',
        ]);

        Permission::create([
            'name' => 'View Product',
            'slug' => 'view-product',
            'description' => 'Allows the user to view product details.',
        ]);
    }
}
