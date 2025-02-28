<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grades;
use App\Models\Majors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $grades = Grades::all();
            $majors = Majors::all();
    
            foreach ($grades as $grade) {
                foreach ($majors as $major) {
                    for ($i = 1; $i <= 5; $i++) {
                        Classroom::updateOrCreate([
                            'name' => "{$grade->grade} {$major->name} {$i}",
                            'grade_id' => $grade->id,
                            'major_id' => $major->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
