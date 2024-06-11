<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function registerManagement() {
        $menu = array(
            'dashboard' => '',
            'student' =>  '',
            'subject' => '',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => 'active'
        );
        return view('admin.registerManagement', [
            'menu' => $menu
        ]);
    }
}
