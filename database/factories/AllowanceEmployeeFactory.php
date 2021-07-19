<?php

namespace Database\Factories;

use App\Models\AllowanceEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\AllowanceType;

class AllowanceEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AllowanceEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $empCount = Employee::count();
        $allowanceCount = AllowanceType::count();
        return [
            'employee_id' => rand(1, $empCount),
            'allowance_type_id' => rand(1, $allowanceCount)
        ];
    }
}
