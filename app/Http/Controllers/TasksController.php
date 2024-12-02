<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = task::all();
        if ($tasks->isEmpty()) {
            return  response()->json('no records found', 404);
        }
        return  response()->json($tasks, 200);
    }


    public function store(StoreTaskRequest $request)
    {
        $task = task::create($request->validated());
        if (!$task) {
            return response()->json(['message' => 'record  not added'], 400);
        }
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

    public function getUserByTask($id)
    {
        $task  = task::find($id);
        if (!$task) {
            return response()->json('record not found', 200);
        }

        $user = $task->user;

        return response()->json($user, 200);
    }
}
