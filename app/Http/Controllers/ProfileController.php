<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilesRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function index()
    {
        $profiles = Profile::get();
        if ($profiles->isEmpty()) {
            return response()->json('No Recored Exists', 400);
        }

        return response()->json($profiles, 200);
    }

    // store
    public function store(StoreProfilesRequest $request)
    {
        // $profile = new Profile();
        // $profile->user_id = $request->user_id;
        // $profile->address = $request->address;
        // $profile->mobile = $request->mobile;
        // $profile->phone = $request->phone;
        // $profile->birthday = $request->birthday;
        // $profile->bio = $request->bio;
        // $profile->save();

        $profile = Profile::create($request->validated());

        return response()->json(['msg' => 'profile addedd', 'data' => $profile], 201);
    }



    public function show($id)
    {

        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json('Reocrod Not Found', 400);
        }
        return response()->json($profile, 200);
    }



    public function update(StoreProfilesRequest $request, $id)
    {

        $profile  = Profile::find($id);
        if (!$profile) {
            return response()->json('Reocrod Not Found', 400);
        }

        $profile->update($request->validated());

        return response()->json(['msg' => 'profile updated', 'data' => $profile], 200);
    }

    public function delete($id)
    {

        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json('Reocrod Not Found', 400);
        }

        $profile->delete();

        return response()->json('Profile Deteted', 200);
    }

    public function getUserProfile($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        return $profile;
    }
}
