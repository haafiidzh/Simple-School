<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() 
    {
        return view('administrator.pages.auth.login');
    }

    public function notice()
    {
        return view('administrator.pages.auth.notice');
    }
}
