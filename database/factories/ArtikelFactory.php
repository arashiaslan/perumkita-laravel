<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
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
            'content' => $this->faker->text(250),
            'writer_id' => User::factory(),
            'writer_name' => $this->faker->name,
            'writer_email' => $this->faker->safeEmail,
            'image' => 'images/article/1731835366.png',
        ];
    }
}
