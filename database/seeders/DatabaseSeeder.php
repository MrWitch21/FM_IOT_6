<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ShiftSeeder;
use Database\Seeders\SkillsSeeder;
use Database\Seeders\ScheduleSeeder;
use Database\Seeders\MaintenanceSeeder;
use Database\Seeders\AdministrationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdministrationSeeder::class,
            SkillsSeeder::class,
            MaintenanceSeeder::class,
            ShiftSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
