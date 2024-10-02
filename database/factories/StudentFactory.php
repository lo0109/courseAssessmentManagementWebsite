<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Student::class;
    public function definition(): array
    {
        return [
            'sNumber' => 'S'.$this->faker->unique()->randomNumber(5,true),
            'name' => $this->faker->name(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),   
        ];
    }
}
