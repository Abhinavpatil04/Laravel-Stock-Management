<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'publication' => $this->faker->company,
            'edition' => $this->faker->date('d F, Y'),
            'cost' => $this->faker->numberBetween(100,3000),
            'description' => $this->faker->paragraph('3'),
            'language' => $this->faker->randomElement(['English', 'Hindi', 'Other']),
            'pages' => $this->faker->numberBetween(100,600),
            'rfid_tag' => $this->faker->numberBetween(1000000000,9999999999),
            'team_id' => $this->faker->numberBetween(1,4),
        ];
    }
}
