<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthControllRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (\auth()->check()) {
            return to_route('dashboard.home');
        }
        return view('dashboard.auth.login');
    }
    public function login(AuthControllRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return to_route('dashboard.login.index')->with('fail', 'Email or Password is wrong!');
        }
        return to_route('dashboard.home')->with('success', 'Log in successfully!');
    }
    public function logout()
    {
        \auth()->logout();
        return to_route('dashboard.login.index');
    }
}
