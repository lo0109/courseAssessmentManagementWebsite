<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Course::class;
    public function definition(): array
    {
        return [
            'courseID' => 'ICT' . $this->faker->unique()->randomNumber(4, true),  // Unique course ID
            'name' => $this->faker->sentence(3),  // Course name
            'description' => $this->faker->paragraph(2),  // Course description
            'workshop' => $this->faker->numberBetween(1,5),  // Random number between 1 and 5
            'online' => $this->faker->boolean(),  // Random boolean for online
            'teacherID' => optional(Teacher::inRandomOrder()->first())->tID,  // Random teacher assignment
        ];
    }
}
