<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin',['only' => ['index']]);
    }

    public function login()
    {
        return view('admin.Admin.login');
    }

    public function post_login(LoginAdminRequest $rq)
    {
        if (Auth::attempt($rq->only('email', 'password'), false)) {
            return redirect()->route('admin');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu không đúng!');
        }
    }

    public function index()
    {
        return view('admin.Admin.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
