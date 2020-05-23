<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.layout.index');
    }

    // chua xu ly dc
    public function getLogin() {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect()->route('admin.index');
        } else {
            return view('admin.layout.login');
        }
    }
    public function postLogin(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ], $remember)){
            return redirect()->route('admin.index');
        } else {
            return view('admin.layout.login');
        }
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
