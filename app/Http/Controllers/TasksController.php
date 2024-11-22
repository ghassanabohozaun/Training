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


        $task = new task();
        $task->title = 'title1111';
        $task->description = 'description34324343243243423';
        $task->priority = '111111';
        $task->save();

        // $tasks = task::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'priority' => $request->priority,
        // ]);

        return response()->json(['message' => 'record added', 'task' => $task], 201);
    }


    public function update(Request $request, $id)
    {
        $task = task::find($id);
        if ($task) {
            // $task->update($request->all());
            $task->update($request->only('title', 'description', 'priority'));
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
