<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        if (!empty($request->input('btn-login'))) {
            $username = $request->input('username');
            $password = $request->input('password');

            $error = '';
            if ($username !== 'admin') {
                $error = 'Tài khoản hoặc mật khẩu không đúng';
                return view('login', compact('error'));
            }

            if ($password !== 'phuongnam123') {
                $error = 'Tài khoản hoặc mật khẩu không đúng';
                return view('login', compact('error'));
            }

            if (empty($error)) {
                $request->session()->put('is_login', true);
                return redirect()->route('admin.dashboard');
            }
        }
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('is_login')) {
            $request->session()->forget('is_login');
            return redirect()->route('login');
        }
    }
}
