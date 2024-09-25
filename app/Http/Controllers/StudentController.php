<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('teacher');
        return view('student.index',[
            'students'=>Student::all(),
            'title'=>'Student'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('teacher');
        return view('student.create',[
            'students'=>User::where('role','student')->get(),
            'grades'=>Grade::all(),
            'title'=>'Create Student'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('teacher');
        $validatedData = $request->validate([
            'NISN'=>'required|min:8|max:11|unique:Students',
            'name'=>'required|max:255',
            'grade_id'=>'required'
        ]);

        Student::create($validatedData);
        return redirect('/student')->with('success','New Student has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        Gate::authorize('teacher');
        return view('student.show',[
            'student'=>$student,
            'title'=>'Detail Student'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        Gate::authorize('teacher');
        return view('student.edit',[
            'students'=>User::where('role','student')->get(),
            'data'=>$student,
            'grades'=>Grade::all(),
            'title'=>'Edit Student'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        Gate::authorize('teacher');
        $validatedData = $request->validate([
            'NISN'=>'required|min:8|max:11',
            'name'=>'required|max:255',
            'grade_id'=>'required'
        ]);

        Student::where('id',$student->id)->update($validatedData);
        return redirect('/student')->with('success','Student has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        Gate::authorize('teacher');
        Student::destroy('id',$student->id);
        return redirect('/student')->with('success','Student has been deleted');
    }
}
