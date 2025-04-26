<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // Use a secure password in production
        ]);
        $admin->roles()->attach(Role::where('slug', 'admin')->first());

        // Vendor user
        $vendor = User::create([
            'name' => 'Vendor User',
            'email' => 'vendor@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $vendor->roles()->attach(Role::where('slug', 'vendor')->first());

        // Customer user
        $customer = User::create([
            'name' => 'Customer User',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $customer->roles()->attach(Role::where('slug', 'customer')->first());
    }
}
