<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_code' => fake()->numerify('CST#########'),
            'user_game_id' => fake()->numerify('##########'),
            'kode_id' => fake()->numerify('???#####'),
            // 'kode_id' => fake()->randomElement(['ECM49559','FIT23197','XSI29615','QUV84242','ILG09365','SRM95391','CEW72369','WQG60036']),
            'phone' => fake()->phoneNumber(),
            'metode'=> fake()->randomElement(['GoPay','DANA','ShopeePay','Transfer-Bank','Credit-Card']),
            // 'total_price'=> fake()->numberBetween(25000, 150000),
            'total_price'=> fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'payment_status',
            'snap_token',
            'status' => fake()->randomElement(['Done','Proses','Cancel'])
        ];
    }
}
