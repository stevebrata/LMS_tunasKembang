@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title}}</h1>
  </div>
  <div class="col-lg-8">
        <form action="/test" method="post">
            @csrf
            <div class="mb-3">
          <label for="subject_id" class="form-label">Subject</label>
          <select class="form-select" name="subject_id" id="subject_id">
            @if (auth()->user()->role === 'admin')
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }} {{ $subject->grade->category }}</option>
            @endforeach
            @else    
            @foreach ($subjects as $subject)
              @if($subject->teacher->name === auth()->user()->name)
                <option value="{{ $subject->id }}">{{ $subject->name }} {{ $subject->grade->category }}</option>
              @endif
            @endforeach
            @endif
          </select>
        </div>
        <div class="mb-3">
            <label for="teacher" class="form-label">Teacher</label>
            <input class="form-control" type="text" id="teacher" readonly value="{{ auth()->user()->name }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        {{-- <div class="mb-3">
            <input type="text" value="{{ $subject->grade->category }}" id="grade" name="grade" class="form-control">
        </div> --}}
        <button type="submit" class="btn btn-primary">Add Test</button>
      </form>
</main>
@endsection