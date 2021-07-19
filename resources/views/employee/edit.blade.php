@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5 ">
    <div class="row mb-5">
        <div class="col">
            <a href="{{'/'.Request::segment(1)}}" class="btn btn-warning btn-raised"> <i class="fas fa-caret-left"></i> Back</a>
        </div>
    </div>
    
    <form class="row" action="{{route('employee.update', $employee->id)}}" method="post">
        @method('put')
        @csrf
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" name="name" value="{{old('name', $employee->name)}}">
                @error('name')
                    <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" class="form-control" id="employee_number" aria-describedby="employeeNumber" placeholder="Enter Employee Number" name="employee_number" value="{{old('employee_number', $employee->employee_number)}}">
                @error('employee_number')
                    <small id="employeeNumber" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="base_salary">Salary</label>
                <input type="text" class="form-control" id="base_salary" aria-describedby="baseSalary" placeholder="Enter Base Salary" name="base_salary" value="{{old('base_salary', $employee->base_salary)}}">
                @error('base_salary')
                    <small id="baseSalary" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Department</label>
                <select class="form-control" id="department" name="department">
                    <option value="">__Please Select__</option>
                    <option value="sales" @if(old('department', $employee->department) == 'sales') selected @endif>Sales</option>
                    <option value="accounting" @if(old('department', $employee->department) == 'accounting') selected @endif>Accounting</option>
                    <option value="customers_relations" @if(old('department', $employee->department) == 'customers_relations') selected @endif>Customer Relations</option>
                </select>
                @error('department')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <div class="container-fluid">
                    <div class="row">
                        <label for="exampleFormControlSelect1">Allowance Types</label>
                    </div>
                    <div class="row">
                        @foreach ($allowance_types as $allowance_type)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="allowance_types" value="{{$allowance_type->id}}" name="allowance_types[]" @if(in_array($allowance_type->id , old('allowance_types', $employee->allowance_types->pluck('id')->toArray()) != null ? old('allowance_types', $employee->allowance_types->pluck('id')->toArray()) : [] )) checked @endif>
                                <label class="form-check-label" for="allowance_types">{{$allowance_type->type}}</label>
                            </div>
                        @endforeach
                        @error('allowance_types')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                
                
               
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success btn-raised">Save</button>
        </div>
    </form>
    
</div>
@endsection

@section('scripts')
    <script>
        $(".sidebar-nav #employees").addClass("active-sidebar");
    </script>
@endsection