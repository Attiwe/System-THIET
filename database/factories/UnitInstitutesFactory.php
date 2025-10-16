<?php

namespace Database\Factories;

use App\Models\UnitInstitutes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitInstitutes>
 */
class UnitInstitutesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnitInstitutes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vision' => $this->faker->paragraph(3),
            'message' => $this->faker->paragraph(2),
            'image' => 'default_unit_institute.jpg', // Placeholder image
            'status' => $this->faker->boolean(80), // 80% chance of being true
        ];
    }
}
