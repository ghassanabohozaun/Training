<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{





    public function index()
    {
        $emplyees = Employee::get();
        return response()->json($emplyees, 200);
    }

    public function store(StoreEmployeeRequest $request)
    {

        // $employee = new Employee();
        // $employee->name = 'ghassan';
        // $employee->age = 30;
        // $employee->salary - 133;
        // $employee->save();

        // $ValidationData = $request->validate([
        //     'name' => 'required',
        //     'age' => 'required|integer',
        //     'salary' => 'required|numeric',
        // ]);

        $employee = Employee::create($request->validated());

        return response()->json(['msg' => 'Record added successfuly', 'data' => $employee], 201);
    }


    public function show($id)
    {

        $employee   = Employee::find($id);
        if (!$employee) {
            return response()->json('Record Not Found', 400);
        }

        return response()->json($employee, 200);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {

        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json('Record Not Found', 400);
        }

        // $ValidationData = $request->validate([
        //     'name' => 'sometimes',
        //     'age' => 'sometimes|integer',
        //     'salary' => 'sometimes|numeric',
        // ]);

        $employee->update($request->validated());
        return response()->json(['msg' => 'recored Updated', 'data' => $employee], 200);
    }

    public function delete($id)
    {
        $employee  = Employee::find($id);
        if (!$employee) {
            return response()->json('Record Not Found', 400);
        }

        $employee->delete();
        return response()->json(['msg' => 'recored deleted'], 200);
    }
}
