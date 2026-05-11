<?php

namespace Database\Factories;

use App\Models\Treatment;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id ?? Student::factory(),
            'keluhan' => fake()->randomElement(['Pusing dan mual', 'Sakit perut', 'Demam tinggi', 'Luka jatuh saat olahraga', 'Masuk angin', 'Pingsan saat upacara']),
            'diagnosa' => fake()->randomElement(['Dispepsia', 'Gejala Tifus', 'Kelelahan', 'Flu dan Batuk', null]),
            'tanggal_kunjungan' => fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
        ];
    }
}
