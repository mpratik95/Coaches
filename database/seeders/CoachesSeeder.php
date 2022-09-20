<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coach;


class CoachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coach::insert([
            [
                'emp_id' => 1001,
                'name' => 'Amit Yadav',
                'timezone' => 'IST',
                'day' => 'Monday',
                'available_at' => '09:00:00',
                'available_until' => '17:30:00'
            ],
            [
                'emp_id' => 1001,
                'name' => 'Amit Yadav',
                'timezone' => 'IST',
                'day' => 'Tuesday',
                'available_at' => '09:00:00',
                'available_until' => '17:30:00'
            ],
            [
                'emp_id' => 1001,
                'name' => 'Amit Yadav',
                'timezone' => 'IST',
                'day' => 'Wednesday',
                'available_at' => '09:00:00',
                'available_until' => '17:30:00'
            ]
            ,
            [
                'emp_id' => 1001,
                'name' => 'Amit Yadav',
                'timezone' => 'IST',
                'day' => 'Thursday',
                'available_at' => '09:00:00',
                'available_until' => '17:30:00'
            ],
            [
                'emp_id' => 1001,
                'name' => 'Amit Yadav',
                'timezone' => 'IST',
                'day' => 'Friday',
                'available_at' => '09:00:00',
                'available_until' => '17:30:00'
            ],
            [
                'emp_id' => 1002,
                'name' => 'Rima Sen',
                'timezone' => 'EST',
                'day' => 'Monday',
                'available_at' => '11:00:00',
                'available_until' => '14:00:00'
            ],
            [
                'emp_id' => 1002,
                'name' => 'Rima Sen',
                'timezone' => 'EST',
                'day' => 'Tuesday',
                'available_at' => '11:00:00',
                'available_until' => '14:00:00'
            ],
            [
                'emp_id' => 1002,
                'name' => 'Rima Sen',
                'timezone' => 'EST',
                'day' => 'Wednesday',
                'available_at' => '11:00:00',
                'available_until' => '14:00:00'
            ],
            [
                'emp_id' => 1003,
                'name' => 'Shawn Wyne',
                'timezone' => 'PST',
                'day' => 'Monday',
                'available_at' => '08:00:00',
                'available_until' => '13:30:00'
            ],
            [
                'emp_id' => 1003,
                'name' => 'Shawn Wyne',
                'timezone' => 'PST',
                'day' => 'Tuesday',
                'available_at' => '10:00:00',
                'available_until' => '15:30:00'
            ],
            [
                'emp_id' => 1003,
                'name' => 'Shawn Wyne',
                'timezone' => 'PST',
                'day' => 'Wednesday',
                'available_at' => '11:00:00',
                'available_until' => '19:30:00'
            ],
            [
                'emp_id' => 1003,
                'name' => 'Shawn Wyne',
                'timezone' => 'PST',
                'day' => 'Thursday',
                'available_at' => '09:00:00',
                'available_until' => '18:30:00'
            ],
        ]
    );
    }
}
