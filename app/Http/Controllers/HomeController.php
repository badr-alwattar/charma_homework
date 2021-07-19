<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowanceType;
use App\Models\Employee;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pieChartData() {

        $allowance_types = AllowanceType::all();
        $employees = Employee::all();

        $datasets = [];
        $labels = $allowance_types->pluck('type')->toArray();
        foreach ($allowance_types as $key => $allowance_type) {
            $res = 0;
            foreach ($employees as $key => $employee) {
                
                $res += isset($employee->allowance_spending[$allowance_type->type]) ? $employee->allowance_spending[$allowance_type->type] : 0;
            }
            array_push($datasets, $res);
        }
        return response()->json(['labels' => $labels, 'datasets' => $datasets], 200);
    }

    public function SalariesChart() {

        $departments = ['sales', 'accounting', 'customers_relations'];
        $employees = Employee::all();

        $datasets = [];
        $labels = ['Sales', 'Accounting', 'Customers Relations'];
        foreach ($departments as $key => $department) {
            $res = 0;
            foreach ($employees as $key => $employee) {
                $res += $employee->department == $department ? $employee->base_salary : 0;
            }
            array_push($datasets, $res);
        }
        return response()->json(['labels' => $labels, 'datasets' => $datasets], 200);
    }
}
