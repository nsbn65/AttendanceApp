<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_rest_time' => $this->$faker->dateTimeBetween($startDate = '11.00.00', $endDate = '12.00.00')->format('H.i.s'),
            'end_rest_time' => $this->$faker->dateTimeBetween($startDate = '12.00.00', $endDate = '13.00.00')->format('H.i.s'),
        ];
    }
}
