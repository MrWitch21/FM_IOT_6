<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $shifts = \App\Models\Shift::all();


        $startDate = Carbon::now()->startOfWeek()->addWeek()->toDateString();


        for ($i = 0; $i < 5; $i++) {
            foreach ($users as $user) {
                $shift = $shifts->random();

                Schedule::create([
                    'user_id' => $user->id,
                    'shift_id' => $shift->id,
                    'shift_date' => $startDate,
                    'note' => 'Automatikusan generált műszak',
                ]);
            }
            $startDate = Carbon::parse($startDate)->addDay()->toDateString();
        }
    }
}
