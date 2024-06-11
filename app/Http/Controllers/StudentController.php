<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
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
            'student' =>  'active',
            'subject' => '',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );
        $studentList = Students::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.student', [
            'students' => $studentList,
            'menu' => $menu,
            'title' => 'students',
            'valueSearch' => null,
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
        $student = Students::where('college_id', $request->college_id)->get();
        if (count($student) == 0) {
        $newStudent = new Students;
        $newStudent->college_id = $request->college_id;
        $newStudent->name = $request->name;
        $newStudent->gender = $request->gender;
        $newStudent->mobile = $request->mobile;
        $newStudent->address = $request->address;
        $newStudent->save();
        return redirect()->route('admin.students')->with('success', 'Thêm thành công');
        } else {
            return redirect()->route('admin.students')->with('error', 'Mã sinh viên đã tồn tại');
        }
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
        $student = Students::find($id);
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->mobile = $request->mobile;
        $student->address = $request->address;
        $student->save();
        return redirect()->route('admin.students')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::where('student_id', $id)->delete();
        $student = Students::find($id);
        $student->delete();
        return redirect()->route('admin.students')->with('success', 'Xóa thành công');
    }
    public function search(Request $request) {
        $menu = array(
            'dashboard' => '',
            'student' =>  'active',
            'subject' => '',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );
        $students = DB::table('students')
                    ->select('*')
                    ->where('name', 'LIKE', '%'.$request->valueSearch.'%')
                    ->orWhere('college_id', 'LIKE', '%'.$request->valueSearch.'%')
                    ->paginate(10);
        return view('admin.student', [
            'valueSearch' => $request->valueSearch,
            'students' => $students,    
            'menu' => $menu,
            'title' => 'students',
            'search' => true,
        ]);
    }
    public function searchResult(Request $request) {
        $resultDetail = DB::table('students')
            ->select('students.college_id as student_id', 'students.name as student_name', 'students.gender', 'subjects.subject_id as subject_id','subjects.name as subject_name', 'study.mark as mark')
            ->join('study', 'students.id', '=', 'study.students_id')
            ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
            ->where('students.college_id', 'LIKE', $request->valueSearch)
            ->get();
        return view('student.dashboard', [
            'resultDetails' => $resultDetail,
        ]);
    }
    public function getResultStudent() {
        $results = DB::table('students')
            ->select('students.id as id','students.college_id as student_id', 'students.name as student_name', DB::raw('sum(subjects.credit) as credit'), DB::raw('ROUND(sum(subjects.credit *study.mark_4)/sum(subjects.credit), 1) as mark'))
            ->join('study', 'students.id', '=', 'study.students_id')
            ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
            ->groupBy('students.college_id')
            ->where('students.id', Auth::user()->student_id)
            ->whereNotNull('mark')
            ->paginate(10);
        
        $resultDetail = DB::table('students')
            ->select('students.college_id as student_id', 'students.name as student_name', 'subjects.credit as credit', 'subjects.subject_id', 'subjects.name as subject_name', 'study.mark as mark', 'study.mark_4 as mark_4', 'study.mark_char as mark_char')
            ->join('study', 'students.id', '=', 'study.students_id')
            ->join('subjects', 'study.subjects_id', '=', 'subjects.id')
            ->where('students.id', Auth::user()->student_id)
            ->orderBy('study.created_at', 'asc')
            ->whereNotNull('mark')
            ->get();
            
        return view('student.dashboard', [
            'resultDetails' => $resultDetail,
            'result' => $results,
        ]);
    }
}
