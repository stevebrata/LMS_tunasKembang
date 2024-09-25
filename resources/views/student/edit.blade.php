@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="col-lg-8">
        <form action="/student/{{ $data->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
          <label for="NISN" class="form-label">NISN</label>
          <input type="text" name="NISN" class="form-control @error('NISN') is-invalid @enderror" id="NISN" aria-describedby="emailHelp" value="{{ old('NISN',$data->NISN) }}">
          @error('NISN')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <select class="form-select" name="name" id="name">
                @foreach ($students as $student)
                @if ($data->name === $student->name)
                <option value="{{old('name', $student->name) }}"@selected(true)>{{ $student->name }}</option>
                @else
                <option value="{{old('name', $student->name) }}">{{ $student->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="grade_id" class="form-label">Grade</label>
            <select class="form-select" name="grade_id" id="grade_id">
                @foreach ($grades as $grade)
                @if ( $data->grade_id === $grade->id)
                <option value="{{old('grade_id', $grade->id) }}" selected>{{ $grade->category }}</option>
                @else
                <option value="{{old('grade_id', $grade->id) }}">{{ $grade->category }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <a href="/student" class="btn btn-primary">Back</a>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
    </main>
    
@endsection