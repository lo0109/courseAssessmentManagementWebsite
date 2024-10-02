<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'sNumber' => 'S98436',
            'name' => 'John Doe',
            'password' => bcrypt('password'),  // Hash the password
            'remember_token' => Str::random(10),  // Generate a random remember token
        ]);
        DB::table('students')->insert([
            'sNumber' => 'S80729',
            'name' => 'Jane Smith',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'sNumber' => 'S49100',
            'name' => 'Mike Johnson',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('students')->insert([
            'sNumber' => 'S42906',
            'name' => 'Alice Brown',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
