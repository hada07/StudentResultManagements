<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentRegisterSubject extends Controller
{
    public function getSubject() {
        $subjectList = DB::table('subjects')
        ->select('subjects.id as id','subjects.subject_id as subject_id', 'subjects.name as name', 'subjects.credit as credit', 'subjects.quantily as quantily',
        'lecturers.name as lecturer_name', DB::raw('Count(study.students_id) as registerQuantily'))
        ->join('study', 'subjects.id', 'study.subjects_id')
        ->join('teach', 'subjects.id', '=', 'teach.subject_id')
        ->join('lecturers', 'teach.lecturer_id', 'lecturers.id')
        ->groupBy('subjects.subject_id')
        ->orderBy('subjects.name', 'asc')
        ->get();
        foreach ($subjectList as $subject) {
            if (count(DB::table('study')->where('students_id', Auth::user()->student_id)
            ->where('subjects_id', $subject->id)->get()) > 0) {
                $subject->isRegister = true;
            } else {
                $subject->isRegister = false;
            }
        }
        $subjectRegister =  DB::table('study')
        ->select('study.id as study_id','subjects.credit as credit',  'subjects.subject_id as subject_id', 'subjects.name as subject_name',
         'lecturers.name as lecturer_name')
        ->join('subjects', 'subjects.id', '=', 'study.subjects_id')
        ->join('teach', 'subjects.id', '=', 'teach.subject_id')
        ->join('lecturers', 'teach.lecturer_id', 'lecturers.id')
        ->orderBy('study.created_at', 'asc')
        ->groupBy('subjects.subject_id')
        ->where('study.students_id', Auth::user()->student_id)
        ->whereNull('mark')
        ->get();
        return view('student.subjectRegister', [
            'subjects' => $subjectList,
            'subjectRegisters' => $subjectRegister,
            'title' => 'subjects',
        ]);
    }
    public function registerSubject(Request $request) {
        foreach($request->subject as $id) {
            DB::table('study')->insert([
                'students_id' => Auth()->user()->student_id,
                'subjects_id' => $id,
            ]);
        }
        return redirect()->route('student.getSubject')->with('success', 'Đăng ký môn học thành công');
    }

    public function deleteSubject($id) {
        DB::table('study')->where('id', $id)->delete();
        return redirect()->route('student.getSubject')->with('success', 'Xóa thành công');
    }

    public function getSubjectRegister() {
        $subjectRegister =  DB::table('study')
        ->select('study.id as study_id','subjects.credit as credit',  'subjects.subject_id as subject_id', 'subjects.name as subject_name',
         'lecturers.name as lecturer_name', 'study.mark as mark')
        ->join('subjects', 'subjects.id', '=', 'study.subjects_id')
        ->join('teach', 'subjects.id', '=', 'teach.subject_id')
        ->join('lecturers', 'teach.lecturer_id', 'lecturers.id')
        ->where('study.students_id', Auth::user()->student_id)
        ->groupBy('subjects.subject_id')
        ->orderBy('study.created_at', 'desc')
        ->get();
        // dd($subjectRegister);
        return view('student.subject',[
            'subjectRegisters' => $subjectRegister,
        ]);
    }
}
