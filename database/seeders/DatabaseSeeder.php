<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Product;
use Modules\Products\Models\Category;
use Modules\Auth\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Yaml\Yaml;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed roles
        $adminRole = Role::firstOrCreate(
            ['slug' => 'admin'],
            ['name' => 'Administrator']
        );

        $userRole = Role::firstOrCreate(
            ['slug' => 'user'],
            ['name' => 'User']
        );
        // Seed admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        $admin->roles()->syncWithoutDetaching([$adminRole->id]);
        // Seed categories
        $categories = Category::factory()->count(10)->create();
        // Seed products
        $products = Product::factory()->count(50)->create();
        // Attach categories to products
        $products->each(function ($product) use ($categories) {
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray(),
                ['added_at' => now()]
            );
        });
    }
}
