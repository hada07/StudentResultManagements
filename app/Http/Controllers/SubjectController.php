<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
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
            'subject' => 'active',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );
        $lecturers = Lecturers::get(['id', 'name']);
        $subjectList = DB::table('subjects')
                        ->select('subjects.id as id', 'subjects.subject_id as subject_id', 'subjects.name as name', 'credit', 'lecturers.name as lecturer_name')
                        ->join('teach', 'subjects.id', '=', 'teach.subject_id')
                        ->join('lecturers', 'lecturer_id', '=', 'lecturers.id')
                        ->groupBy('subjects.id')
                        ->orderBy('subjects.created_at', 'desc')
                        ->paginate(10);
        return view('admin.subject', [
            'lecturers' => $lecturers,
            'valueSearch' => null,
            'subjects' => $subjectList,
            'menu' => $menu,
            'title' => 'subjects',
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
            'subject_id' => 'required',
            'name' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
         }
        $newSubject = new Subjects;
        $newSubject->subject_id = $request->subject_id;
        $newSubject->name = $request->name;
        $newSubject->credit = $request->credit;
        $newSubject->save();
        DB::table('teach')->insert(['subject_id'=>$newSubject->id, 'lecturer_id'=>$request->lecturer]);
        return redirect()->route('admin.subjects')->with('success', 'Subject add successfully');
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
        $subject = Subjects::find($id);
        $subject->name = $request->name;
        $subject->subject_id = $request->subject_id;
        $subject->credit = $request->credit;
        $subject->save();
        if ($request->lecturer) {
            DB::table('teach')->where('subject_id', $id)->update(['lecturer_id'=>$request->lecturer]);
        } 
        return redirect()->route('admin.subjects')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subjects::find($id);
        $subject->delete();
        return redirect()->route('admin.subjects')->with('success', 'Xóa thành công');
    }
    public function search(Request $request) {
        $menu = array(
            'dashboard' => '',
            'student' =>  '',
            'subject' => 'active',
            'lecturer' => '',
            'result' => '',
            'registerManagement' => ''
        );
        $lecturers = Lecturers::get(['id', 'name']);
        $subjects =DB::table('subjects')
                    ->select('subjects.id as id', 'subjects.subject_id as subject_id', 'subjects.name as name', 'credit', 'lecturers.name as lecturer_name')
                    ->join('teach', 'subjects.id', '=', 'teach.subject_id')
                    ->join('lecturers', 'lecturer_id', '=', 'lecturers.id')
                    ->groupBy('subjects.id')
                    ->where('subjects.name', 'LIKE', '%'.$request->valueSearch.'%')
                    ->paginate(10);
        return view('admin.subject', [
            'lecturers' => $lecturers,
            'valueSearch' => $request->valueSearch,
            'subjects' => $subjects,    
            'menu' => $menu,
            'title' => 'subjects',
        ]);
    }
}
