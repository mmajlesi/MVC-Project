<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return 'welcome';
    }
    public function register()
    {
        return view('register');
    }
}
