<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['salary', 'allowance_spending'];


    //RELATIONSHIPS
    public function allowance_types()
    {
        return $this->belongsToMany(AllowanceType::class)->using(AllowanceEmployee::class);
    }

    //SETTERS AND GETTERS
    public function getSalaryAttribute(){
        $salary = $this->base_salary;

        foreach ($this->allowance_types as $key => $allowance) {
            $salary += $this->base_salary * $allowance->percantage;
        }
        
        return $salary;
    }

    public function getAllowanceSpendingAttribute(){
        $allowance_spending = [];
        
        foreach ($this->allowance_types as $key => $allowance) {
            $allowance_spending[$allowance->type] = $this->base_salary * $allowance->percantage;
        }
        
        return $allowance_spending;
    }
}
