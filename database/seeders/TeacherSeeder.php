<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = Subject::pluck('id')->toArray();

        $teachers = [
            [
                'name' => 'Budi Santoso',
                'nip' => '1234567890',
                'email' => 'budi@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 1',
                'gender' => 'L',
                'religion' => 'Islam',
                'birth_date' => '1980-05-15',
                'birth_place' => 'Jakarta',
                'subject_id' => $subjects[array_rand($subjects)],
            ],
            [
                'name' => 'Siti Aminah',
                'nip' => '0987654321',
                'email' => 'siti@example.com',
                'phone' => '081298765432',
                'address' => 'Jl. Sejahtera No. 2',
                'gender' => 'P',
                'religion' => 'Islam',
                'birth_date' => '1985-08-20',
                'birth_place' => 'Bandung',
                'subject_id' => $subjects[array_rand($subjects)],
            ],
            [
                'name' => 'Andi Wijaya',
                'nip' => '1122334455',
                'email' => 'andi@example.com',
                'phone' => '081211223344',
                'address' => 'Jl. Pendidikan No. 3',
                'gender' => 'L',
                'religion' => 'Islam',
                'birth_date' => '1975-12-01',
                'birth_place' => 'Surabaya',
                'subject_id' => $subjects[array_rand($subjects)],
            ],
            [
                'name' => 'Rina Permata',
                'nip' => '5566778899',
                'email' => 'rina@example.com',
                'phone' => '081255667788',
                'address' => 'Jl. Pelajar No. 4',
                'gender' => 'P',
                'religion' => 'Islam',
                'birth_date' => '1990-07-07',
                'birth_place' => 'Yogyakarta',
                'subject_id' => $subjects[array_rand($subjects)],
            ],
            [
                'name' => 'Ahmad Fauzi',
                'nip' => '6677889900',
                'email' => 'ahmad@example.com',
                'phone' => '081266778899',
                'address' => 'Jl. Guru No. 5',
                'gender' => 'L',
                'religion' => 'Islam',
                'birth_date' => '1988-02-25',
                'birth_place' => 'Medan',
                'subject_id' => $subjects[array_rand($subjects)],
            ],
        ];

        foreach ($teachers as $teacher) {
            $created = Teacher::create($teacher);

            $classroomIds = Classroom::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray();
            $created->classrooms()->attach($classroomIds);
        }
    }
}
