<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\FacultyMembers;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacultyMembers>
 */
class FacultyMembersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\FacultyMembers>
     */
    protected $model = FacultyMembers::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();

        return [
            'roles_id' => Roles::query()->inRandomOrder()->value('id') ?? Roles::factory(),
            'department_id' => Department::query()->inRandomOrder()->value('id') ?? Department::factory(),
            'name' => $name,
            'type' => $this->faker->randomElement(['دكتور', 'معيد']),
            'faculty_code' => $this->faker->unique()->numberBetween(100000, 999999),
            'email' => $this->faker->unique()->safeEmail(),
            'facebook' => $this->faker->optional()->url(),
            'phone' => $this->faker->optional()->e164PhoneNumber(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('password'),
            'appointment_type' => $this->faker->randomElement(['معين', 'منتدب', 'غير ذلك']),
            'appointment_date' => $this->faker->date(),
            'personal_image' => 'default.jpg',
            'resume' => 'resume.pdf',
            'researches' => $this->faker->optional()->sentence(),
        ];
    }
}


