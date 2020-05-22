<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        dd('dhc');        
        return view('admin.layout.index');
    }

    // chua xu ly dc
    public function loginAdmin() {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect()->route('admin.index');
        } else {
            return view('admin.layout.login');
        }
    }
    public function postLoginAdmin(Request $request) {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ], $remember)){
            dd($request->all());
            return redirect()->route('admin.index');
        };
    }
    public function logoutAdmin() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
