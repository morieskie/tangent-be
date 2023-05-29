<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\EmployeeSkill::factory(10)
        // ->hasEmployee(1)
        // ->hasSkill(1)
        ->create();
    }
}
