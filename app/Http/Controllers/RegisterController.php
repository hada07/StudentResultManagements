<?php

namespace App\Http\Controllers;

use App\Mail\AccountMail;
use App\Models\Lecturers;
use App\Models\Students;
use Illuminate\Support\Str;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    //
    public function showRegister() {
        return view('register');
    }
    public function sendmail($email, $password, $emailReceive) {
        $detail = [
            'title' => 'Mail from UET',
            'body' =>  [$email, $password]
        ];
        Mail::to($emailReceive)->send(new AccountMail($detail));
        return 'Email sent';
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(),[
            'college_id' => 'required', 
            'email' => 'required',
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Cần nhập đầy đủ thông tin');
        }
        $id = 0;
        $isStudent = true;
        $lecturer = null;
        $student = Students::where('college_id', $request->college_id)->get();
        if (count($student) == 0) {
            $isStudent = false;
            $lecturer = Lecturers::where('college_id', $request->college_id)->get();
            if (count($lecturer) == 0) {
                return redirect()->route('showRegister')->with('error', 'Mã trường cung cấp không chính xác');
            } else {
                $id = $lecturer[0]->id;
                $editLecturer = Lecturers::find($id);
                $editLecturer->email = $request->email;
                $editLecturer->save();
            }
        } else {
            $id = $student[0]->id;
            $editStudent = Students::find($id);
            $editStudent->email = $request->email;
            $editStudent->save();
        }
        $usersIsExit = Users::where('student_id', $id)->get();
        $newEmail = $request->college_id . "@vnu.edu.vn";
        $newPassword = Str::random('8');
        if (!count($usersIsExit)) {
            if ($isStudent) {
                $newUser = new Users();
                $newUser->name = $student[0]->name;
                $newUser->role = '3';
                $newUser->avatar = null;
                $newUser->email = $newEmail;
                $newUser->password = Hash::make($newPassword);
                $newUser->student_id = $student[0]->id;
                $newUser->lecturer_id = null;
                $newUser->email_verified_at = now();
                $newUser->save();
                $this->sendmail($newEmail, $newPassword, $request->email);
            } else {
                $newUser = new Users();
                $newUser->name = $lecturer[0]->name;
                $newUser->role = '2';
                $newUser->avatar = null;
                $newUser->email = $newEmail;
                $newUser->password = Hash::make($newPassword);
                $newUser->lecturer_id = $lecturer[0]->id;
                $newUser->student_id = null;
                $newUser->email_verified_at = now();
                $newUser->save();
                $this->sendmail($newEmail, $newPassword, $request->email);
            }
        } else {
            return redirect()->route('showRegister')->with('error', 'Tài khoản của sinh viên đã tồn tại');
        }
        return redirect()->route('login')->with('success', 'Bạn đã đăng ký thành công. Tài khoản và mật khẩu đã được gửi vê email của bạn');
    }
}
