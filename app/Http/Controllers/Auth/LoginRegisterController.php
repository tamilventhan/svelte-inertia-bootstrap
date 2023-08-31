<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return Inertia::render('auth/registration');
    }

    public function login()
    {
        return Inertia::render('auth/login');
    }
}
