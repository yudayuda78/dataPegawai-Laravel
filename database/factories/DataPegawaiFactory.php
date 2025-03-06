<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPegawai>
 */
class DataPegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'kantor' => $this->faker->city(),
            'umur' => $this->faker->numberBetween(25, 50),
            'photo' => 'https://picsum.photos/200',
            'document' => 'documents/sample.pdf',
            'start_date' => Carbon::now()->subYears(rand(1, 10))->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
