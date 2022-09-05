<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(4),
            'Description' => Str::random(10),
            'min_qte' => $this->faker->numberBetween(1,10),
            'price_per_item' => $this->faker->numberBetween(20,50),
            'active' => false
        ];
    }
}
