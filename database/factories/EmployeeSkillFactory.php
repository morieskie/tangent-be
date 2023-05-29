<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skill;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeSkill>
 */
class EmployeeSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => function () {
                if ($employee = Employee::inRandomOrder()->first()) {
                    return $employee->id;
                }

                return Employee::factory()->create()->id;
            },
            'skill_id' => function () {
                if (($skill = Skill::inRandomOrder()->first()) && mt_rand(0, 1)) {
                    return $skill->id;
                }

                return Skill::factory()->create()->id;
            },
            'years' => fake()->randomDigit,
            'level' => fake()->numberBetween(1, 5)
        ];
    }
}
