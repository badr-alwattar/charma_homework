@extends('layouts.app')

@section('content')

<div class="container-fluid w-100 mt-5">
    <div class="row w-100 mb-5 justify-content-between">
        <div class="col-sm-3">
            <a href="{{route('employee.create')}}" class="btn btn-success"> Add Employee</a>
        </div>
        <div class="col-sm-5">
            @include('layouts.patials.flash_messages')
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12 mx-1">
            <table id="employees_table" class="table w-100 stripe row-border order-column">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name En</th>
                        <th scope="col">Emp No.</th>
                        <th scope="col">Department</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key => $employee)
                        <th scope="row">{{$key+1}}</th>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->employee_number}}</td>
                            <td>{{$employee->department}}</td>
                            <td>{{$employee->salary}}</td>
                            
                            <td>
                                <div class="btn-group" role="group">
                                    <a role="button" class="btn btn-outline-secondary mr-2" href="{{route('employee.edit', $employee->id)}}"><i class="far fa-edit"></i></a>
                                    <form action="{{route('employee.destroy', $employee->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" href="#" onclick="return confirmDelete()" class="btn btn-outline-danger mr-2"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(".sidebar-nav #employees").addClass("active-sidebar");
        function confirmDelete() {
            if (confirm("Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        $(document).ready(function() {
            $('#employees_table').DataTable( {
                scrollCollapse: true,
                paging:         true,
                fixedColumns:   true
            });
        });
    </script>
@endsection