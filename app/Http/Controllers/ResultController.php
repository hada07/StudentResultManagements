<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
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
            'result' => 'active',
            'registerManagement' => ''
        );
        $results = DB::table('students')
            ->select('students.id as id', 'students.avatar as avatar', 'students.college_id as student_id', 'students.name as student_name', DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
            ->join('study', 'students.id', '=', 'study.students_id')
            ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
            ->groupBy('students.id')
            ->whereNotNull('mark')
            ->paginate(10);

        return view('admin.result', [
            'valueSearch' => null,
            'results' => $results,
            'menu' => $menu,
            'title' => 'results'
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

    public function getResultStudent($id)
    {
        $menu = array(
            'dashboard' => '',
            'student' =>  '',
            'subject' => '',
            'lecturer' => '',
            'result' => 'active',
            'registerManagement' => ''
        );
        $resultDetail = DB::table('students')
            ->select('students.college_id as student_id', 'students.name as student_name','subjects.credit as credit', 'subjects.subject_id', 'subjects.name as subject_name', 'study.mark as mark', 'study.mark_4 as mark_4', 'study.mark_char as mark_char')
            ->join('study', 'students.id', '=', 'study.students_id')
            ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
            ->where('students.id', $id)
            ->whereNotNull('study.mark')
            ->paginate(10);
        return view('admin.resultDetail', [
            'resultDetails' => $resultDetail,
            'menu' => $menu,
        ]);
    }
}
