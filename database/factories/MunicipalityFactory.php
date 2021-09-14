<?php

namespace Database\Factories;

use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Municipality::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'code' => $this->faker->randomNumber(),
            'ward_number' => $this->faker->numberBetween(1, 10),
            'district_id' => $this->faker->numberBetween(1, 10),
            'slug' => $this->faker->sentence(),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
