<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Assessment::class;
    public function definition(): array
    {
        return [
            'courseID' => Course::inRandomOrder()->first()->courseID,  // Random course ID
            'typeID' => 1,  // Assign a static type ID, modify as necessary
            'title' => $this->faker->sentence(3),  // Random assessment title
            'instruction' => $this->faker->paragraph(2),  // Random instructions
            'maxScore' => $this->faker->numberBetween(50, 100),  // Random max score
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),  // Future deadline
            'reviewNumber' => $this->faker->numberBetween(1, 5),  // Random number of reviews
        ];
    }
}
