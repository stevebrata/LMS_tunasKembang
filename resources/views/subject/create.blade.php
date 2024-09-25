@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title}}</h1>
  </div>
<div class="col-lg-8">
  <form action="/subject" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="grade_id" class="form-label">Grade</label>
      <select class="form-select" name="grade_id" id="grade_id">
      @foreach ($grades as $grade)
        <option value="{{ old('grade_id', $grade->id )}}">{{ $grade->category }}</option>
      @endforeach
      </select>
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</main>    
@endsection