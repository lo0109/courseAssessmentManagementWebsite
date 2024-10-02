<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AssessmentTypeSeeder;
use Database\Seeders\PeerReviewTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed 5 teachers
        \App\Models\Teacher::factory(5)->create();

        // Seed 50 students
        \App\Models\Student::factory(50)->create();

        //seed 10 courses
        \App\Models\Course::factory(10)->create();

        //seed assessment types
        $this->call(AssessmentTypeSeeder::class);
        //seed peer review types
        $this->call(PeerReviewTypeSeeder::class);
        //seed test students
        $this->call(StudentTableSeeder::class);
        //seed test teachers
        $this->call(TeacherTableSeeder::class);
        //seed test courses
        $this->call(CourseTableSeeder::class);
        //seed test enrollements
        $this->call(EnrollmentSeeder::class);

        //seed 10 assessments
        \App\Models\Assessment::factory(10)->create();

    }
}
