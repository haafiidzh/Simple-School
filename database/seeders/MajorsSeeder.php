<?php

namespace Database\Seeders;

use App\Models\Majors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['name' => 'MIPA'],
            ['name' => 'IPS'],
            ['name' => 'Bahasa'],
        ];

        foreach ($datas as $data) {
            Majors::updateOrCreate([
                'name' => $data['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
