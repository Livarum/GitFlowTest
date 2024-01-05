<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Make sure to import your Product model

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable model events during seeding to improve performance
        Product::withoutEvents(function () {
            // Create 10 products
            for ($i = 1; $i <= 10; $i++) {
                Product::create([
                    'name' => 'Product ' . $i,
                    'description' => 'Description for Product ' . $i,
                    'price' => rand(10, 100), // Assuming a random price between 10 and 100
                ]);
            }
        });
    }
}
