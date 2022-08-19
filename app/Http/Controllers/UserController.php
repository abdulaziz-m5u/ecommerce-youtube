<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        
        return response()->json([
            'users' => $users,
            'status' => 200
        ]);
    }
}
