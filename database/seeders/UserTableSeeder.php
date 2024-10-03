<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seed 5 teachers
        DB::table('users')->insert([
            'id' => 240000,
            'name' => 'Teacher1',
            'password' => bcrypt('password'),  // Hash the password
            'teacher' => true,  // teacher
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher2',
            'password' => bcrypt('password'),  // Hash the password
            'teacher' => true,  // teacher
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher3',
            'password' => bcrypt('password'),  // Hash the password
            'teacher' => true,  // teacher
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher4',
            'password' => bcrypt('password'),  // Hash the password
            'teacher' => true,  // teacher
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        DB::table('users')->insert([
            'name' => 'Teacher5',
            'password' => bcrypt('password'),  // Hash the password
            'teacher' => true,  // teacher
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        
    }
}
