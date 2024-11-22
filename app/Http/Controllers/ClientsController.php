<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function checkkUClientFunction($id = null)
    {

        if ($id > 10) {
            return response()->json(['message' => 'Sorry Access denied because execeed allowed limit'], 204);
        } else {
            return response()->json(['message' => 'hi client Access allowed'], 200);
        }
    }
}
