<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();

        if ($students->isEmpty()) {
            return response()->json('No Student Exists', 404);
        } else {
            return response()->json($students, 200);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        // $student = new Student();
        // $student->name = $request->name;
        // $student->age = $request->age;
        // $student->grade = $request->grade;
        // if ($student->save()) {
        //     return response()->json(['msg' => 'Recored Added Successfylly ', 'data' => $student], 200);
        // } else {
        //     return response()->json('Record not added', 400);
        // }

        // $student =  Student::create([
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'grade' => $request->grade,
        // ]);

        $student  = Student::create($request->validated());


        if ($student) {
            return response()->json(['msg' => 'Recored Added Successfylly ', 'data' => $student], 200);
        } else {
            return response()->json('Record not added', 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json('Record not exist', 400);
        }

        return response()->json($student, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json('Record not exist', 400);
        }


        $ValidationData = $request->validate([
            'name' => 'sometimes|string|max:20',
            'age' => 'sometimes|numeric',
            'grade' => 'nullable|numeric'
        ]);

        $student->update($ValidationData);

        return response()->json(['msg' => 'Recored Updated successfully', 'data' => $student], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json('Record Not Found', 400);
        }
        if ($student->delete()) {
            return response()->json('Record not deleted', 400);
        } else {
            return response()->json('Record deleted', 200);
        }
    }
}
