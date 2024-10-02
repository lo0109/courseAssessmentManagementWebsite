<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'tID' => 'T12345',
            'name' => 'Teacher',
            'password' => bcrypt('password'),  // Hash the password
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
    }
}
