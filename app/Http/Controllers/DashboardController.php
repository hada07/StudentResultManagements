<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = array(
            'dashboard' => 'active',
            'student' =>  '',
            'subject' => '',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );
        $sumStudent = Students::count();
        $sumSubject = Subjects::count();
        $sumLecturer = Lecturers::count();
        $sumUser = Users::count();
        $studentIncrease = Students::whereMonth('created_at', date('m'))->count();
        $subjectIncrease = Subjects::whereMonth('created_at', date('m'))->count();
        $lecturerIncrease = Lecturers::whereMonth('created_at', date('m'))->count();
        $userIncrease = Users::whereMonth('created_at', date('m'))->count();
        $excellentStudent = DB::table('students')
        ->select(DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
        ->join('study', 'students.id', '=', 'study.students_id')
        ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
        ->groupBy('students.college_id')
        ->having('mark', '>=', 3.6)
        ->whereNotNull('mark')
        ->count();
        $goodStudent = DB::table('students')
        ->select(DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
        ->join('study', 'students.id', '=', 'study.students_id')
        ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
        ->groupBy('students.college_id')
        ->having('mark', '>=', 3.2)
        ->having('mark', '<', 3.6)
        ->whereNotNull('mark')
        ->count();
        $normalStudent = DB::table('students')
        ->select(DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
        ->join('study', 'students.id', '=', 'study.students_id')
        ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
        ->groupBy('students.college_id')
        ->having('mark', '>=', 2.5)
        ->having('mark', '<', 3.2)
        ->whereNotNull('mark')
        ->count();
        $weakStudent = DB::table('students')
        ->select(DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
        ->join('study', 'students.id', '=', 'study.students_id')
        ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
        ->groupBy('students.college_id')
        ->having('mark', '<', 2.5)
        ->whereNotNull('mark')
        ->count();
        $users = Users::where('role', '<>', 1)->get(['id', 'name', 'email', 'student_id', 'lecturer_id']);
        return view('admin.dashboard', [
            'menu' => $menu,
            'title' => 'dashboard',
            'sumStudent' => $sumStudent,  
            'sumSubject' => $sumSubject,
            'sumLectuter' => $sumLecturer,  
            'sumUser' => $sumUser,
            'studentIncrease' => $studentIncrease,
            'subjectIncrease' => $subjectIncrease,
            'lecturerIncrease' => $lecturerIncrease,
            'userIncrease' => $userIncrease,
            'excellentStudent' => $excellentStudent,
            'goodStudent'=> $goodStudent,
            'normalStudent'=> $normalStudent,
            'weakStudent' => $weakStudent,
            'users' => $users,
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
        //
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
        //
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
}
