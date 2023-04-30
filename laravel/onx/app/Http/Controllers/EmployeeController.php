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
    }
    public function update(int $id,Request $request){
        $employee = Employee::find($id);
        $employee->first_name = $request->firstName;
        $employee->last_name = $request->lastName;
        $employee->save();
    }
    public function read(int $id){
        return Employee::find($id);
    }
    public function readAll(){
        return Employee::all();
    }
    public function delete(int $id){
        $employee = Employee::find($id);
        $employee->delete();
    }
}
