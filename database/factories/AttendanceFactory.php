<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => $this->$faker->dateTimeBetween($startDate = '8.50.00', $endDate = '9.10.00')->format('H.i.s'),
            'end_time' => $this->$faker->dateTimeBetween($startDate = '18.00.00', $endDate = '23.59.59')->format('H.i.s'),
        ];
    }
}
