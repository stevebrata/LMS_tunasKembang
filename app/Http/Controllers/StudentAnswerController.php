<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Score;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('student.score.index',[
            'title'=>'Score'
        ]);
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
        $request->validate([
            'answer.*'=>'required',
        ],
        [
            'answer.*'=>'Answer should be filled'
        ]);

        $score = 0;
        $final_score=0;
        $count = count($request->answer);
        foreach ($request->answer as $key => $value) {
            if ($value === $request->correct_answer[$key]) {
                $score = $score + 1;
            }
            StudentAnswer::create([
                'student_id'=>$request->student_id,
                'question_id'=>$request->question_id,
                'answer'=>$value,

            ]);
        }
        $final_score = ($score*100)/$count;
        Score::create([
            'score'=>$final_score,
            'is_done'=>true,
            'student_id'=>$request->student_id,
            'test_id'=>$request->test_id,
        ]);

        // return view('student.score.index', [
        //     'score'=>$final_score,
        //     'title'=>'Score'
        // ]);
        return redirect('/test')->with('score','Congratulation you finished the exam');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAnswer $studentAnswer)
    {
        //
    }
}
