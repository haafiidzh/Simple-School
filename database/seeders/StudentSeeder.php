<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Majors;
use App\Models\Grades;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = ['L', 'P'];
        $majors = Majors::all();
        $grades = Grades::all();
        $classrooms = Classroom::all();

        for ($i = 1; $i <= 750; $i++) {
            Student::create([
                'name' => 'Siswa ' . $i,
                // 'nis' => 'NIS' str_pad($i, 4, '0', STR_PAD_LEFT),
                'nis' => rand(1000,999999999),
                'email' => 'siswa' . $i . '@example.com',
                'phone' => '0812' . rand(10000000, 99999999),
                'address' => 'Alamat Siswa ' . $i,
                'gender' => $genders[array_rand($genders)],
                'religion' => 'Islam',
                'birth_date' => now()->subYears(rand(10, 18))->format('Y-m-d'),
                'birth_place' => 'Kota ' . $i,
                'major_id' => $majors->random()->id,
                'grade_id' => $grades->random()->id,
                'classroom_id' => $classrooms->random()->id,
            ]);
        }
    }
}
