<?php

namespace App\Http\Controllers;


use App\Models\task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = task::all();
        return  response()->json($tasks, 200);
    }


    public function store(Request $request)
    {


        $taskValidation =  $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'required',
            'priority' => 'required|integer|max:5|min:1',
        ]);


        // $task = task::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'priority' => $request->priority,
        // ]);

        $task = task::create($taskValidation);

        return response()->json(['message' => 'record added', 'task' => $task], 201);
    }


    public function update(Request $request, $id)
    {
        $task = task::find($id);
        if ($task) {


            $validationData = $request->validate([
                'title' => 'sometimes|string|max:30',
                'description' => 'sometimes',
                'priority' => 'sometimes|integer|max:5|min:1',
            ]);

            $task->update($validationData);
            return response()->json($task, 200);
        } else {
            return response()->json('record not updated', 400);
        }
    }

    public function show($id)
    {
        $task = task::find($id);
        if ($task) {
            return response()->json($task, 200);
        } else {
            return response()->json('record not found', 204);
        }
    }


    public function delete($id)
    {
        $task = task::find($id);
        $task->delete();
        return response()->json('record deleted', 204);
    }
}
