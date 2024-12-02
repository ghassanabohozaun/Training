<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        return response()->json($users, 200);
    }

    public function show($id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json('record not found', 200);
        }
        $userProfileOnly  =  $user->profile;
        $userProfile = $user->with('profile')->first();

        return response()->json($userProfile, 200);
    }


    public function getUserTasks($id)
    {

        $user = User::find($id);
        if (!$user) {
            return response()->json('record not found', 200);
        }

        $userTasks = $user->tasks;
        return response()->json($userTasks, 200);
    }
}
