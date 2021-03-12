<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id'            =>   User::factory(),
            'first_name'         =>   $this->faker->firstNameMale,
            'last_name'          =>   $this->faker->lastName,
            'dob'                =>   $this->faker->date('Y-m-d'),
            'gender'             =>   'Male',
            'address'            =>   $this->faker->address,
            'status'             =>   "Active",
            'test'               =>   0,
            'registerd_date'     =>   now(),
        ];
    }
}
