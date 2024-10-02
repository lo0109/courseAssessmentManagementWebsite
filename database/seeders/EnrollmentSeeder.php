<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enrollment')->insert([
            'sNumber' => 'S98436',
            'courseID' => 'ICT9734',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S98436',
            'courseID' => 'ICT5329',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S98436',
            'courseID' => 'ICT6124',
            'workshop' => 1,
        ]);


        DB::table('enrollment')->insert([
            'sNumber' => 'S80729',
            'courseID' => 'ICT9734',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S80729',
            'courseID' => 'ICT5329',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S80729',
            'courseID' => 'ICT6124',
            'workshop' => 1,
        ]);


        DB::table('enrollment')->insert([
            'sNumber' => 'S49100',
            'courseID' => 'ICT9734',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S49100',
            'courseID' => 'ICT5329',
            'workshop' => 1,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S49100',
            'courseID' => 'ICT6124',
            'workshop' => 1,
        ]);


        DB::table('enrollment')->insert([
            'sNumber' => 'S42906',
            'courseID' => 'ICT9734',
            'workshop' => 2,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S42906',
            'courseID' => 'ICT5329',
            'workshop' => 2,
        ]);
        DB::table('enrollment')->insert([
            'sNumber' => 'S42906',
            'courseID' => 'ICT6124',
            'workshop' => 2,
        ]);
    }
}
