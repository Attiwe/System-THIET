<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\DepartmentHead;
use App\Models\FacultyMembers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartmentHead>
 */
class DepartmentHeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\DepartmentHead>
     */
    protected $model = DepartmentHead::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentId = Department::query()->inRandomOrder()->value('id') ?? Department::factory();

        // Prefer selecting a faculty member from the same department, fallback to any
        $facultyMemberId = FacultyMembers::query()
            ->where('department_id', $departmentId)
            ->inRandomOrder()
            ->value('id')
            ?? FacultyMembers::query()->inRandomOrder()->value('id')
            ?? FacultyMembers::factory();

        return [
            'department_id' => $departmentId,
            'faculty_members_id' => $facultyMemberId,
            'scientific_experiences' => $this->faker->paragraphs(2, true),
            'achievements' => $this->faker->paragraphs(2, true),
            'name' => $this->faker->name(),
        ];
    }
}


