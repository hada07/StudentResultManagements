<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LecturerController extends Controller
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
            'lecturer' => 'active',
            'result' => '',
            'registerManagement' => ''
        );
        $lecturerList = Lecturers::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.lecturer', [
            'valueSearch' => null,
            'lecturers' => $lecturerList,
            'menu' => $menu,
            'title' => 'lecturers',
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
        $validator = Validator::make($request->all(),[
            'college_id' => 'required',
            'name' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
         }
        $newLecturer = new Lecturers;
        $newLecturer->college_id = $request->college_id;
        $newLecturer->name = $request->name;
        $newLecturer->save();
        return redirect()->route('admin.lecturers')->with('success', 'Lecturer add successfully');
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }
        $lecturer = Lecturers::find($id);
        $lecturer->name = $request->name;
        $lecturer->level = $request->level;
        $lecturer->mobile = $request->mobile;
        $lecturer->address = $request->address;
        $lecturer->save();
        return redirect()->route('admin.lecturers')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturers::find($id);
        $lecturer->delete();
        Users::where('lecturer_id', $id)->delete();
        return redirect()->route('admin.lecturers')->with('success', 'Xóa thành công');
    }
    public function search(Request $request) {
        $menu = array(
            'dashboard' => '',
            'student' =>  '',
            'subject' => '',
            'lecturer' => 'active',
            'result' => '',
            'registerManagement' => ''
        );
        $lecturers = DB::table('lecturers')
                    ->select('*')
                    ->where('name', 'LIKE', '%'.$request->valueSearch.'%')
                    ->paginate(10);
        return view('admin.lecturer', [
            'valueSearch' => $request->valueSearch,
            'lecturers' => $lecturers,    
            'menu' => $menu,
            'title' => 'lecturers',
        ]);
    }

    public function getSubjectAssign() {
        $subject = DB::table('subjects')    
            ->select('subjects.id as id','subjects.subject_id as subject_id', 'subjects.credit as credit', 'subjects.name as name', 'subjects.description as description', DB::raw('count(study.id) as numberStudent'))
            ->join('teach', 'subjects.id', 'teach.subject_id')
            ->join('study', 'subjects.id', 'study.subjects_id')
            ->groupBy('subject_id')
            ->where('teach.lecturer_id', Auth::user()->lecturer_id)
            ->get();
        return view('lecturer.dashboard', [
            'subjects' => $subject,
        ]);
    }

    public function getStudentList($id) {
        $students = DB::table('students')
                    ->select('study.subjects_id as subject_id','students.id as id', 'students.college_id as college_id', 'students.name as name', 'students.gender as gender', 'students.avatar as avatar', 'students.mobile as mobile', 'study.mark as mark')
                    ->join('study', 'students.id', 'study.students_id')
                    ->where('study.subjects_id', $id)
                    ->get();
        return view('lecturer.studentList', [
            'students' => $students,
        ]);
    }

    public function updateMarkStudent(Request $request, $student_id, $subject_id) {
        $mark = $request->mark;
        if ($mark > 10 || $mark < 0) {
            return redirect()->route('lecturer.subject.listStudent', $subject_id)->with('error', 'Điểm chỉ nên nằm trong khoảng từ 0 đến 10');
        }
        $mark_4 = 0;
        $mark_char = '';
            if ($mark > 8.5) {
                $mark_4 = 4;
                $mark_char = 'A';
            } else if ($mark < 8.5 && $mark >= 8) {
                $mark_4 = 3.5;
                $mark_char = 'B+';
            } else if ($mark < 8 && $mark >= 7) {
                $mark_4 = 3;
                $mark_char = 'B';
            } else if ($mark < 7 &&  $mark > 6.5) {
                $mark_4 = 2.5;
                $mark_char = 'C+';
            } else if ($mark < 6.5 && $mark >= 6) {
                $mark_4 = 2;
                $mark_char = 'C';
            } else {
                $mark_4 = 1.5;
                $mark_char = 'D';
            }
        DB::table('study')
        ->where('students_id', $student_id)
        ->where('subjects_id', $subject_id )
        ->update(['mark'=> $mark, 'mark_4' => $mark_4, 'mark_char' => $mark_char]);
        return redirect()->route('lecturer.subject.listStudent', $subject_id)->with('success', 'Cập nhật điểm thành công');
    }

}
