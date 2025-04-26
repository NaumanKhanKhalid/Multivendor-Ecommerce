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
        $admin = User::where('email', 'admin@gmail.com')->first();
        $vendor = User::where('email', 'vendor@gmail.com')->first();
        $customer = User::where('email', 'customer@gmail.com')->first();

        $admin->roles()->attach(Role::where('slug', 'admin')->first());
        $vendor->roles()->attach(Role::where('slug', 'vendor')->first());
        $customer->roles()->attach(Role::where('slug', 'customer')->first());
    }
}
