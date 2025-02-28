<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Biologi',
            'Sejarah',
            'Geografi',
            'Ekonomi',
            'Pendidikan Agama',
            'Seni Budaya',
            'Pendidikan Jasmani',
            'TIK (Teknologi Informasi dan Komunikasi)',
        ];

        foreach ($datas as $item) {
            Subject::create([
                'name' => $item,
                'description' => "Mata pelajaran $item.",
            ]);
        }
    }
}
