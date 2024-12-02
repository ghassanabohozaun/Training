<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    // index

    public function index()
    {

        $tasks = Task::get();
        if ($tasks->isEmpty()) {
            return response()->json('Sorry No Data Found', 404);
        }

        return response()->json($tasks, 200);
    }



    // store
    public function store(StoreTaskRequest $request)
    {

        // $task = new Task();
        // $task->title = 'title 1';
        // $task->description = 'description 1';
        // $task->priority = '1';

        // $task  = new Task();
        // $task->title = $request->title;
        // $task->description =  $request->description;
        // $task->priority = $request->priority;

        // if ($task->save()) {
        //     return response()->json(['msg' => 'Success , recored added  ', 'data' => $task], 200);
        // } else {
        //     return response()->json('Error , Record Not Addedd', 200);
        // }

        // $task  = Task::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'priority' => $request->priority,
        // ]);

        // $validationData = $request->validate([
        //     'title' => 'required|string|max:20',
        //     'description' => 'required|string|max:100',
        //     'priority' => 'required|numeric',
        // ]);

        $task = Task::create($request->validated());


        if (!$task) {
            return response()->json('Error , Record Not Addedd', 400);
        }
        return response()->json(['msg' => 'Success , Recored Added  ', 'data' => $task], 200);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json('Error , Record Not Found', 404);
        }

        return response()->json($task, 200);
    }



    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json('Error , Record Not Found', 404);
        }

        $task->update($request->validated());

        return response()->json(['msg' => 'Success , Recored Updated  ', 'data' => $task], 200);
    }

    public function destroy($id)
    {

        $task = Task::find($id);
        if (!$task) {
            return response()->json('Error , Record Not Found', 404);
        }

        if ($task->delete()) {
            return response()->json(['msg' => 'Success , Recored Deleted'], 202);
        } else {
            return response()->json(['msg' => 'Error , Recored  Not Deleted  ', 'data' => $task], 400);
        }
    }
}
