<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::create([
            'name' => 'Reggeli (6-14)',
            'start_time' => '06:00:00',
            'end_time' => '14:00:00',
        ]);

        Shift::create([
            'name' => 'Délutáni (14-22)',
            'start_time' => '14:00:00',
            'end_time' => '22:00:00',
        ]);

        Shift::create([
            'name' => 'Esti (22-6)',
            'start_time' => '22:00:00',
            'end_time' => '06:00:00',
        ]);
    }
}
