<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\AllowanceType;
use App\Models\AllowanceEmployee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Employee::factory(50)->create();
        AllowanceType::factory(1)->create([
            'type' => 'Accommodation',
            'percantage' => 0.25
        ]);
        AllowanceType::factory(1)->create([
            'type' => 'Transportation',
            'percantage' => 0.1
        ]);
        AllowanceType::factory(1)->create([
            'type' => 'Living',
            'percantage' => 0.20
        ]);

        $empCount = Employee::count();
        $allowanceCount = AllowanceType::count();
        for ($i=0; $i < 100; $i++) { 
            AllowanceEmployee::create([
                'employee_id' => rand(1, $empCount),
                'allowance_type_id' => rand(1, $allowanceCount)
            ]);
        }

    }
}
