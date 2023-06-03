<?php

use Illuminate\Database\Seeder;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createWeekDays();
    }

    public function createWeekDays()
    {
        $days = [
            [
                'name' => 'شنبه',
                'day_of_week' => '0',
            ],
            [
                'name' => '1 شنبه',
                'day_of_week' => '1',
            ],
            [
                'name' => '2 شنبه',
                'day_of_week' => '2',
            ],
            [
                'name' => '3 شنبه',
                'day_of_week' => '3',
            ],
            [
                'name' => '4 شنبه',
                'day_of_week' => '4',
            ],
            [
                'name' => '5 شنبه',
                'day_of_week' => '5',
            ],
            [
                'name' => 'جمعه',
                'day_of_week' => '6',
            ],
        ];
        \App\Models\WeekDay::insert($days);
    }
}
