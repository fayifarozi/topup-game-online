<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'image' =>fake()->image(null, 200, 200, 'animals', true, true, 'cats', true, 'jpg'),
            'password' => Hash::make('123')
            // 'password' => Hash::make(fake()->password(6,8))
        ];
    }
}
