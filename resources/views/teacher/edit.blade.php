@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="col-lg-8">
      <form action="/teacher/{{ $teach->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <select class="form-select" name="name" id="name">
      @foreach ($teachers as $teacher)
      @if ($teach->name == $teacher->name)        
      <option value="{{ old('name',$teacher->name) }}" selected>{{ $teacher->name }}</option>
      @else
      <option value="{{ old('name',$teacher->name) }}">{{ $teacher->name }}</option>
        
      @endif
        @endforeach
      </select>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="subject_id" class="form-label">Subject</label>
        <select class="form-select" name="subject_id" id="subject_id">
            @foreach ($subjects as $subject)
            @if ($teach->subject_id === $subject->id)  
            <option value="{{old('subject_id', $subject->id) }}" selected>{{ $subject->name }} {{ $subject->grade->category }}</option>
            @else
            <option value="{{old('subject_id', $subject->id) }}">{{ $subject->name }} {{ $subject->grade->category }}</option>
            @endif
            @endforeach
        </select>
    </div>
    {{-- <div class="mb-3">
        <label for="grade" class="form-label">Grade</label>
        <input type="text" id="grade" name="grade" class="form-control" value="{{ $subject->grade->category }}" readonly>
    </div> --}}
    <a href="/teacher" class="btn btn-warning">Back</a>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
    </div>
    </main>
    
@endsection