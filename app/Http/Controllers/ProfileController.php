<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    // index

    public function index()
    {

        $profiles = Profile::get();
        if ($profiles->isEmpty()) {
            return response()->json('Sorry No Data Found', 404);
        }

        return response()->json($profiles, 200);
    }



    // store
    public function store(StoreProfileRequest $request)
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

        $profile = Profile::create($request->validated());


        if (!$profile) {
            return response()->json('Error , Record Not Addedd', 400);
        }
        return response()->json(['msg' => 'Success , Recored Added  ', 'data' => $profile], 200);
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json('Error , Record Not Found', 404);
        }

        return response()->json($profile, 200);
    }



    public function update(UpdateProfileRequest $request, $id)
    {
        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json('Error , Record Not Found', 404);
        }

        $profile->update($request->validated());

        return response()->json(['msg' => 'Success , Recored Updated  ', 'data' => $profile], 200);
    }

    public function destroy($id)
    {

        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json('Error , Record Not Found', 404);
        }

        if ($profile->delete()) {
            return response()->json(['msg' => 'Success , Recored Deleted'], 202);
        } else {
            return response()->json(['msg' => 'Error , Recored  Not Deleted  ', 'data' => $profile], 400);
        }
    }
}
