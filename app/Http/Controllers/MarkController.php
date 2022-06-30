<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\MarkList;
use Illuminate\Http\Request;
use Exception;
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $marks = Mark::whereHas('student', function($q){
            $q->orderBy('name', 'asc');
        })->paginate(5);
        return view('mark.index',compact('marks','subjects'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('mark.create',compact('students','subjects'));
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
                'student_id' => 'required',
                'term' => 'required',
                'mark' => 'required',
                'mark.*' => 'required|numeric|gt:0',
            ]);

        try{

         
            $mark = Mark::create([
                    'student_id'          => $request->student_id,
                    'term'                => $request->term
            ]);

            
           foreach($request->mark  as $key => $value){
              
                $mark_lists = new MarkList();
                $mark_lists->subject_id =   $key;
                $mark_lists->mark_id    =   $mark->id;
                $mark_lists->mark       =   $value;
                $mark_lists->save();
           }
            
           
            return redirect()->route('marks.index')
            ->with('success','Mark List created successfully.');
        }catch (Exception $e) {
           
         
            if (strpos($e->getMessage(), "Integrity constraint violation: 1062 Duplicate entry") !== false) {
                return redirect()->back()->withErrors( 'Duplicate Entry');
            }
            return redirect()->back()->withErrors('error', 'There was a failure while sending the message!');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('mark.edit',compact('students','subjects','mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        
      
            $request->validate([
                'student_id' => 'required',
                'term' => 'required',
                'mark' => 'required',
                'mark.*' => 'required|numeric|gt:0',
            ]);

        try{
            $mark->update([
                    'student_id'          => $request->student_id,
                    'term'                => $request->term
            ]);

            foreach($mark->mark_list  as $key => $list){
                if(@$request->mark[$list->subject_id]){
                    $list->update(['mark' => $request->mark[$list->subject_id]]);
                }
                
            }
            return redirect()->route('marks.index')->with('success','Mark List Updated successfully.');
        }catch (Exception $e) {
            dd($e->getMessage());
            if (strpos($e->getMessage(), "Integrity constraint violation: 1062 Duplicate entry") !== false) {
                return redirect()->back()->withErrors( 'Duplicate Entry');
            }
            return redirect()->back()->withErrors('error', 'There was a failure while sending the message!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index')
                        ->with('success','Mark List deleted successfully');
    }
}
