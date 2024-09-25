<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('post.index',[
            'title'=>'News',
            'students'=>Student::all(),
            'posts'=>Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('teacher');
        return view('post.create',[
            'title'=>'Create News',
            'subjects'=>Subject::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData= $request->validate([
            'name'=>'required|max:30',
            'subject_id'=>'required',
            'image'=>'image|max:2048|file'
            // 'body'=>'required'
        ]);
        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('post-images');
        }
        
        $validatedData['body']=$request['message'];
        // dd($validatedData);

        Post::create($validatedData);
        return redirect('/post')->with('success','New message has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        Gate::authorize('teacher');
        return view('post.show',[
            'title'=> 'Detail Message',
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(Request $request)
    {

        return Storage::download($request->name);
 
    }
}
