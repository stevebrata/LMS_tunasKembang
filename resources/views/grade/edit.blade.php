@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="col-lg-8">
        <form action="/grade/{{ $grade->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <input type="text" name="category" class="form-control" id="category" 
           value="{{ old('category', $grade->category) }}" @error('category')
               is-invalid @enderror aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="teacher" class="form-label">Teacher</label>
            <input type="text" name="teacher" class="form-control" id="teacher" value="{{ old('teacher', $grade->teacher) }}" @error('teacher')
            is-invalid @enderror>
        </div>
        <div class="mb-3">
            <label for="assistant" class="form-label">Assistant</label>
            <input type="text" name="assistant" class="form-control" id="assistant" value="{{ old('assistant', $grade->assistant) }}" @error('assistant')
            is-invalid @enderror>
        </div>
        <a href="/grade" class="btn btn-primary">Back</a>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
    </main>
    
@endsection