<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('10#####'),
            'nama' => fake()->name(),
            'kelas_id' => SchoolClass::inRandomOrder()->first()->id ?? 1,
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
        ];
    }
}
