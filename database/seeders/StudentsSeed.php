<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $student = [
        //     [
        //         'idstudents' => '12345',
        //         'fullname' => 'Ibnu',
        //         'gender' => 'M',
        //         'address' => 'Tangerang',
        //         'email' => 'ibnu@gmail.com',
        //         'phone' => '12345'
        //     ],
        //     [
        //         'idstudents' => '12346',
        //         'fullname' => 'Nurdiyansa',
        //         'gender' => 'M',
        //         'address' => 'Tangerang',
        //         'email' => 'nurdiyansa@gmail.com',
        //         'phone' => '12346'
        //     ],
        //     [
        //         'idstudents' => '12347',
        //         'fullname' => 'Azstar',
        //         'gender' => 'M',
        //         'address' => 'Tangerang',
        //         'email' => 'azstar@gmail.com',
        //         'phone' => '12347'
        //     ]
        // ];

        // foreach($student as $val) {
        //     Students::create($val);
        // }

        // Membuat random data
        Students::factory()->count(500)->create();
    }
}
