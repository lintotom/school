<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $students = Student::orderBy('name','asc')->paginate(5);
        return view('student.index',compact('students'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('student.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'teacher_id' => 'required',
            'dob'   => 'required|date|date_format:Y-m-d'
        ]);
        $student = Student::create([
                'name'          => $request->name,
                'gender'        => $request->gender,
                'dob'           => $request->dob,
                'teacher_id'    => $request->teacher_id,
        ]);
        return redirect()->route('student.index')
        ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('student.edit',compact('student','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'teacher_id' => 'required',
            'dob'   => 'required|date|date_format:Y-m-d'
        ]);
        $student->update([
                'name'          => $request->name,
                'gender'        => $request->gender,
                'dob'           => $request->dob,
                'teacher_id'    => $request->teacher_id,
        ]);
        return redirect()->route('student.index')
        ->with('success','Student Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
  
        return redirect()->route('student.index')
                        ->with('success','Student deleted successfully');
    }
}
