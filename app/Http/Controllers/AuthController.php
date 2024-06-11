<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLogin() {
        if(Auth::check()){
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role == 3) {
                return redirect()->route('student.dashboard');
            } else {
                return redirect()->route('lecturer.dashboard');
            }
        }else{
            return view('login');
        }
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $user = Users::where('email', $request->email)->where('password', $request->password)->get();
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            } else if (Auth::user()->role == 3) {
                return redirect()->route('student.dashboard')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('lecturer.dashboard')->with('success', 'Đăng nhập thành công');
            }
        }
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
    }
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        }
        return 'error';
    }
    public function sendMail(Request $request) {
        $detail = [
            'title' => 'Mail from UET',
        ];
        Mail::to($request->email)->send(new ForgotPasswordMail($detail));
        return redirect()->route('login')->with('success', 'Thông tin đã được gửi về mail');
    }
    public function showResetPassword() {
        return view('resetPassword');
    } 
    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required', 
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Cần nhập đầy đủ thông tin');
        }
        $user = Users::where('email', $request->email)->first();
        if(strcmp($request->password, $request->confirm_password) == 0){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect()->route('resetPassword')->with('error', 'Thông tin nhập đang không chính xác.');
        }

    }
}
