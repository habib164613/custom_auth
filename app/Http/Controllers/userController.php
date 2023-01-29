<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function dashboard()
    {
        return view('user');
    }
}
