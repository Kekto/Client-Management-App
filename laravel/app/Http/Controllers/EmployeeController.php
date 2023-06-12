<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(Request $request){
        $employee = new Employee();
        $employee->first_name = $request->firstName;
        $employee->last_name = $request->lastName;
        $employee->save();

        return response(['Message' => 'Employee created successfuly'],201);
    }
    public function update(int $id,Request $request){
        $employee = Employee::find($id);
        $employee->first_name = $request->firstName;
        $employee->last_name = $request->lastName;
        $employee->save();

        return response(['Message' => 'Employee updated successfuly'],200);
    }
    public function read(int $id){
        return response(['Message' => 'Employee '.$id,'employee' => Employee::find($id)],200);

    }
    public function readAll(){
        return response(['Message' => 'All Employees','employee' => Employee::all()],200);
    }
    public function delete(int $id){
        $employee = Employee::find($id);
        $employee->delete();

        return response(['Message' => 'Employee Deleted Succesfuly'],200);
    }
}
