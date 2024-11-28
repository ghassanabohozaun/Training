<?php

namespace App\Http\Controllers;

use App\Models\Client_Detail;
use Illuminate\Http\Request;

class ClientDetailController extends Controller
{
    public function index()
    {
        $details  = Client_Detail::get();
        return response()->json($details, 200);
    }

    public function store(Request $request)
    {

        $detail = Client_Detail::create([
            'client_id' => $request->client_id,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return response()->json(['msg' => 'recored added', 'data' => $detail], 200);
    }
}
