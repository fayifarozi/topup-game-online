<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;

class MySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Admin::factory()->create([
        //     'name' => 'Fayi Farozi',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123')
        // ]);
        
        // Admin::factory(5)->create();
        Product::factory(6)->create();
        // Order::factory(10)->create();

    }
}
