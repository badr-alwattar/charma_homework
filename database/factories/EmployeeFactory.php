<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'employee_number' => $this->faker->numberBetween($min = 1000, $max = 9999),
            'base_salary' => $this->faker->numberBetween($min = 10000, $max = 99999),
            'department' => $this->faker->randomElement(['accounting', 'sales', 'customers_relations']),
        ];
    }
}
