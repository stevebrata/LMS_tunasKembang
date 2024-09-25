<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('admin');
        return view('teacher.index',[
            'teachers'=>Teacher::paginate(5),
            'title'=>'Teacher'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('admin');
        return view('teacher.create',[
            'subjects'=>Subject::all(),
            'teachers'=>User::where('role','teacher')->get(),
            'title'=>'Add Teacher'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('admin');
        $ValidatedData=$request->validate([
            'name'=>'required',
            'subject_id'=>'required',
        ]);

        Teacher::create($ValidatedData);
        return redirect('/teacher')->with('success','New teacher has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        Gate::authorize('admin');
        return view('teacher.show',[
            'title'=>'Detail teacher',
            'teacher'=>$teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {
        //
        Gate::authorize('admin');
        return view('teacher.edit',[
            'teach'=>$teacher,
            'subjects'=>Subject::all(),
            'teachers'=>User::where('role','teacher')->get(),
            'title'=>'Edit teacher'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
        Gate::authorize('admin');
        $ValidatedData=$request->validate([
            'name'=>'required',
            'subject_id'=>'required',
        ]);

        Teacher::where('id',$teacher->id)->update($ValidatedData);
        return redirect('/teacher')->with('success','Teacher has been Edited.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
        Gate::authorize('admin');
        Teacher::destroy($teacher->id);
        return redirect('/teacher')->with('success','Teacher has been deleted');
    }
}
