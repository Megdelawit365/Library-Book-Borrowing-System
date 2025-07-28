<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowed = $this->faker->dateTimeThisCentury();
        $returned = $this->faker->dateTimeBetween($borrowed, 'now');
        return [
            "student_id" => Student::factory(),
            "book_id" => Book::factory(),
            "borrowed_at" => $borrowed,
            "returned_at" => $returned,
        ];
    }
}
