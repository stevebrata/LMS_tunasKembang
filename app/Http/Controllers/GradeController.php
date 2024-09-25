<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('admin');
        return view('grade.index',[
            'grades'=>Grade::all(),
            'title'=>'Grades'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('admin');
        return view('grade.create',[
            'title'=>'Add new grade',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('admin');
        $validatedData =$request->validate([
            'category'=>'required|max:2',
            'teacher'=>'required|max:255',
            'assistant'=>'required|max:255',
        ]);
        Grade::create($validatedData);
        return redirect('/grade')->with('success','New class has been added.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
        Gate::authorize('admin');
        return view('grade.show',[
            'title'=>'Detail Grade',
          'grade'=>  $grade
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
        Gate::authorize('admin');
        return view('grade.edit',[
            'title'=>'Edit grade',
            'grade'=>$grade
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        //
        Gate::authorize('admin');
        $validatedData =$request->validate([
            'category'=>'required|max:2',
            'teacher'=>'required|max:255',
            'assistant'=>'required|max:255',
        ]);
        Grade::where('id',$grade->id)->update($validatedData);
        return redirect('/grade')->with('success','New class has been editeed.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
        Gate::authorize('admin');
        Grade::destroy($grade->id);
        return redirect('/grade')->with('success','Class has been deleted.');
    }
}
