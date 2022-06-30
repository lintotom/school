<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Exception;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(5);
        return view('teacher.index',compact('teachers'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
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
            'name' => 'required'
        ]);
        Teacher::create([
                'name'          => $request->name,
        ]);
        return redirect()->route('teacher.index')
        ->with('success','Teacher Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $teacher->update([
                'name'          => $request->name,
        ]);
        return redirect()->route('teacher.index')
        ->with('success','Teacher Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
    
        try{
           
            $teacher->delete();
    
            return redirect()->route('teacher.index')
                            ->with('success','Teacher Data deleted successfully');
        }catch (Exception $e) {
            if (strpos($e->getMessage(), 'Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
                return redirect()->back()->with('error', 'Can not remove teacher, he/she has been assigned to students');
            }
          
            return redirect()->back()->with('error', 'There was a failure while sending the message!');
        }
        
    }
}
