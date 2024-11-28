<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {

        $clients =  Client::get();

        if ($clients->isEmpty()) {
            return response()->json('no records fount', 400);
        } else {
            return response()->json($clients, 200);
        }
    }

    public function store(StoreClientRequest $request)
    {

        // $client = new Client();
        // $client->name = $request->name;
        // $client->age = $request->age;
        // $client->class  = $request->class;
        // $client->save();

        // $client = Client::create([
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'class' => $request->class,
        // ]);

        // $validationData = $request->validate([

        //     'name' => 'required|string|max:20',
        //     'age' => 'required|integer',
        //     'class' => 'sometimes|required',
        // ]);

        $client = Client::create($request->validated());

        if (!$client->save()) {
            return response()->json(['msg' => 'Reocred not Added'], 400);
        }

        return response()->json(['msg' => 'Reocred Added', 'data' => $client], 201);
    }

    public function show($id)
    {

        //$client = Client::find($id)->clientDetail;
        $client  = Client::where('id', $id)->with('clientDetail')->first();

        if (!$client) {
            return response()->json('Record Not Found', 404);
        }

        return response()->json(['msg' => 'Reocred Found', 'data' => $client], 200);
    }



    public function update(UpdateClientRequest $request, $id)
    {

        // $validationData =  $request->validate([
        //     'name' => 'sometimes|required|string|max:20',
        //     'age' => 'sometimes|required|integer',
        //     'class' => 'sometimes',
        // ]);

        // $client = Client::find($id);

        // $client->name = $request->name;
        // $client->age = $request->age;
        // $client->class = $request->class;
        // // $client->update([
        // //     'name' => $request->name,
        // //     'age' => $request->age,
        // //     'class' => $request->class,
        // // ]);
        // $client->save();


        $client = Client::find($id);

        if (!$client) {
            return response()->json('Record Not Found', 404);
        }

        $client->update($request->validated());

        return response()->json(['msg' => 'Reocred Updated', 'data' => $client], 200);
    }


    public function delete($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json('Record Not Found', 404);
        }

        if ($client->delete()) {
            return response()->json('Record deleted', 200);
        } else {
            return response()->json('Record Not Deleted', 404);
        }
    }
}
