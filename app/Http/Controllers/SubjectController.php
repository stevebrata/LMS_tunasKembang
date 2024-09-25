<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('admin');
        return view('subject.index',[
            'subjects'=> Subject::paginate(5),
            'title'=>'Subjects'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('admin');
        return view('subject.create',[
            'title'=>'Create new Subject',
            'grades'=>Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('admin');
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'grade_id'=>'required'
        ]);
        Subject::create($validatedData);
        return redirect('/subject')->with('success','New subject has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
        Gate::authorize('admin');
        return view('subject.show',[
            'subject'=>$subject,
            'title'=>'Detail subject'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
        Gate::authorize('admin');
        return view('subject.edit',[
            'subject'=>$subject,
            'title'=>'Edit subject',
            'grades'=>Grade::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
        Gate::authorize('admin');
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'grade_id'=>'required'
        ]);
        Subject::where('id',$subject->id)->update($validatedData);
        return redirect('/subject')->with('success','Subject has been edited.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
        Gate::authorize('admin');
        Subject::destroy($subject->id);
        return redirect('/subject')->with('success','Subject has been deleted.');
    }
}
