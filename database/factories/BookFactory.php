<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'title' => $this->faker->word(),
			'isbn' => $this->faker->isbn13(),
			'publication_year' => $this->faker->year(),
			'genre' => $this->faker->randomElements(['Fiction', 'Non-Fiction', 'Science Fiction']),
        ];
    }
}
