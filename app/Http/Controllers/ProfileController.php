<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menu = array(
            'dashboard' => '',
            'student' =>  '',
            'subject' => '',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );

        return view('admin.profile', [
            'menu' => $menu,
            'title' => 'dashboard',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request, $id)
    {
        $user = Users::find($id);
        if (strcmp($user->password, Hash::make($request->old_password)) != 0) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('admin.profile')->with('success', 'Mật khẩu cập nhật thành công');
        }
        return redirect()->route('admin.profile')->with('error', 'Mật khẩu cũ nhập không chính xác');
    }
    public function uploadAvatar(Request $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $storedPath = $image->move('images', $image->getClientOriginalName());
            $user = Users::find(Auth::user()->id);
            $user->avatar = $storedPath;
            $user->save();
            return redirect()->route('admin.profile')->with('success', 'thay đôi avatar thành công');
        }
        return redirect()->route('admin.profile')->with('error', 'Chưa chọn ảnh để cập nhật');
    }
}
