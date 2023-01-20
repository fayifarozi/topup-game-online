<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $baseprice = (float)fake()->regexify('[1-9]{3}[0]{2}');
        $tax = $baseprice * 0.1;
        $amount = $baseprice + $tax;

        return [
            'game' => Arr::random(['Mobile Legends','Genshin Impact','Free Fire','PUBG','Valorant']),
            'kode_id'=>fake()->unique()->regexify('[A-Z]{3}[0-9]{5}'),
            // 'kode_id' => fake()->randomElement(['ECM49559']),
            // 'kode_id' => fake()->randomElement(['FIT23197']),
            // 'kode_id' => fake()->randomElement(['XSI29615']),
            // 'kode_id' => fake()->randomElement(['QUV84242']),
            // 'kode_id' => fake()->randomElement(['ILG09365']),
            'item' => fake()->numberBetween(200, 1000),
            'price' => $amount,
            'status' => fake()->randomElement(['active','non-active'])
        ];
    }
}
