<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\MasterisDoctoralTheses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterisDoctoralTheses>
 */
class MasterisDoctoralThesesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\MasterisDoctoralTheses>
     */
    protected $model = MasterisDoctoralTheses::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeValues = collect(MasterisDoctoralTheses::$enumType)->pluck('value')->all();

        return [
            'department_id' => Department::query()->inRandomOrder()->value('id') ?? Department::factory(),
            'doctor_name' => $this->faker->name(),
            'title_thesis' => $this->faker->sentence(6),
            'description' => $this->faker->paragraphs(2, true),
            'thesis_pdf' => 'theses/sample.pdf',
            'type' => $this->faker->randomElement($typeValues),
        ];
    }
}


