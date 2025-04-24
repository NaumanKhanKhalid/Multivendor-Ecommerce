<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // Get the role instances
        $adminRole = Role::where('slug', 'admin')->first();
        $vendorRole = Role::where('slug', 'vendor')->first();
        $customerRole = Role::where('slug', 'customer')->first();

        // Get permissions
        $createProduct = Permission::where('slug', 'create-product')->first();
        $editProduct = Permission::where('slug', 'edit-product')->first();
        $deleteProduct = Permission::where('slug', 'delete-product')->first();
        $viewOrders = Permission::where('slug', 'view-orders')->first();
        $createOrder = Permission::where('slug', 'create-order')->first();
        $manageUsers = Permission::where('slug', 'manage-users')->first();
        $manageVendorProducts = Permission::where('slug', 'manage-vendor-products')->first();
        $viewProduct = Permission::where('slug', 'view-product')->first();

        // Admin permissions (All permissions)
        $adminRole->permissions()->sync([
            $createProduct->id,
            $editProduct->id,
            $deleteProduct->id,
            $viewOrders->id,
            $createOrder->id,
            $manageUsers->id,
            $manageVendorProducts->id,
            $viewProduct->id,
        ]);

        // Vendor permissions
        $vendorRole->permissions()->sync([
            $createProduct->id,
            $editProduct->id,
            $deleteProduct->id,
            $viewOrders->id,
            $manageVendorProducts->id,
            $viewProduct->id,
        ]);

        // Customer permissions
        $customerRole->permissions()->sync([
            $createOrder->id,
            $viewProduct->id,
        ]);
    }
}
