<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(50),
            'status' => 'pending',
            'user_id' => User::factory(), // ini akan otomatis membuat user jika tidak ada
            'guest_name' => $this->faker->name,
            'guest_email' => $this->faker->safeEmail,
            'guest_telp' => $this->faker->phoneNumber,
        ];
    }
}
