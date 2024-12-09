<?php
namespace Database\Factories;
use Faker\Factory as Faker;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=Faker::create();
        
        return [
            
            'name' => $this->faker->name(),
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(1,999),
            'product_type_id'=> $this->faker->numberBetween(1,3),
        ];
    }
}
