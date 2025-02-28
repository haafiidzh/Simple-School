<?php

namespace Database\Seeders;

use App\Models\Grades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['grade' => '10'],
            ['grade' => '11'],
            ['grade' => '12'],
        ];

        foreach ($datas as $data) {
            Grades::updateOrCreate([
                'grade' => $data['grade'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
