<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('teacher');
        $validatedData = $request->validate([
            'question'=>'required',
            'test_id'=>'required',
            'answer.0'=>'required',
            'answer.1'=>'required',
            'answer.2'=>'required',
            'answer.3'=>'required',
        ],
        [
            'question'=>'Question field is required',
            'answer.0'=>'Answer A field is required',
            'answer.1'=>'Answer B field is required',
            'answer.2'=>'Answer C field is required',
            'answer.3'=>'Answer D field is required',
        ]);
        // dd($validatedData);
        if (!$request->is_true) {
            return back()->with('failed', 'Please choose one for correct answer');
        }
        Question::create($validatedData);
        $question = Question::latest()->get();
        $question_id=$question[0]->id;
        $is_true_id=(key($request->is_true));
        foreach ($request->answer as $key => $value) {
            $key === $is_true_id ? $is_true = true : $is_true =false;
            Answer::create([
                'answer'=>$value, 
                'is_true'=> $is_true,
                'question_id'=>$question_id
            ]);
        }
        return back()->with('success', 'Question has been added');
        // return redirect('/test')->with('success', 'Test has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
