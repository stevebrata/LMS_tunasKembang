<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Score;
use App\Models\Answer;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('test.index',[
            'title'=> 'Test',
            'tests'=> Test::all(),
            'students'=>Student::all(),
            'scores'=>Score::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('teacher');
        return view('test.create',[
            'title'=> 'Create Test',
            'subjects'=> Subject::all()
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
            'name'=>'required|max:20',
            'subject_id'=>'required'
        ]);
        $validatedData['is_active'] = true;

        Test::create($validatedData);

        return redirect('/test')->with('success', 'Test has been made');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
        return view('test.show',[
            'title'=>'Detail test',
            'test'=>$test,
            'student'=>Student::where('name',Auth::user()->name)->get(),
            'questions'=>Question::where('test_id',$test->id)->get(),
            'answers'=>Answer::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
        Gate::authorize('teacher');
        return view('test.edit',[
            'title'=>'Edit Test',
            'subjects'=> Subject::all(),
            'test'=>$test
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
        Gate::authorize('teacher');
        $validatedData = $request->validate([
            'name'=> 'required',
            'subject_id'=>'required'
        ]);
        $validatedData['is_active'] = true;
        Test::where('id',$test->id)->update($validatedData);
        return redirect('/test')->with('success', 'Test has been edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
        Gate::authorize('teacher');
        Test::destroy($test->id);
        return redirect('/test')->with('success','Test has been deleted');
    }
}
