<?php

// database/seeders/UsersSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create an admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'alexm33d3a3ryd4y@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Assign all permissions to the admin user
        $adminRole = Role::findByName('admin');
        $adminUser->assignRole($adminRole->name);

        // Create a visitor user
        $visitorUser = User::create([
            'name' => 'Visitor User',
            'email' => 'visitor@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign visitor permissions to the visitor user
        $visitorRole = Role::findByName('visitor');
        $visitorUser->assignRole($visitorRole->name);
    }
}

