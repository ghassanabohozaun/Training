<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $users = [
            ['name' => 'John', 'age' => 20],
            ['name' => 'Ghassan', 'age' => 33]
        ];

        // foreach ($users as $i => $user) {
        //     echo $user['name'] . ' ' . $user['age'] . "\n";
        // }

        return  response()->json(['age' => 16, 'name' => 'John'], 500);
    }
}
