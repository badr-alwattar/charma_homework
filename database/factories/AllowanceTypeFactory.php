<?php

namespace Database\Factories;

use App\Models\AllowanceType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllowanceTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AllowanceType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => '',
            'percantage' => 0,
        ];
    }
}
