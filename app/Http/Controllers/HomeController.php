<?php

namespace Buiz\Http\Controllers;

use Illuminate\Http\Request;

use Buiz\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->userType === 0) {
            return view('homeTeacher');
        }
        else
        {
            return view('homeStudent');
        }
    }
}
