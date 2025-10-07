<?php

namespace Database\Factories;

use App\Models\Publishing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publishing>
 */
class PublishingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publishing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publishing_name' => $this->faker->company() . ' للنشر',
            'phone' => $this->faker->phoneNumber(),
            'publishing_description' => $this->faker->optional()->paragraph(),
        ];
    }
}
