<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        // Attach roles to users (if not already attached)
        $admin = User::where('email', 'admin@example.com')->first();
        $vendor = User::where('email', 'vendor@example.com')->first();
        $customer = User::where('email', 'customer@example.com')->first();

        $admin->roles()->attach(Role::where('slug', 'admin')->first());
        $vendor->roles()->attach(Role::where('slug', 'vendor')->first());
        $customer->roles()->attach(Role::where('slug', 'customer')->first());
    }
}
