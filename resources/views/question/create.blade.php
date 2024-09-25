@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title}}</h1>
  </div>
  <div class="col-lg-8">
        <form action="/question" method="post">
            @csrf
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input name="question" id="question" class="form-control @error('question') is-invalid @enderror" type="text">
            @error('question')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Answer</label>
        </div>
        <div class="mb-3">
            <label for="answer[0]" class="form-label">A</label>
            <input type="checkbox" name="is_true[0]" id="is_true[0]">
            <input id="answer[0]" name="answer[0]" class="form-control @error('answer[0]') is-invalid @enderror" type="text">
            @error('answer[0]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer[1]" class="form-label">B</label>
            <input type="checkbox" name="is_true[1]" id="is_true[1]">
            <input id="answer[1]" name="answer[1]" class="form-control @error('answer[1]') is-invalid @enderror" type="text">
            @error('answer[1]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer[2]" class="form-label">C</label>
            <input type="checkbox" name="is_true[2]" id="is_true[2]">
            <input class="form-control @error('answer[2]') is-invalid @enderror" type="text" id="answer[2]" name="answer[2]">
            @error('answer[2]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer[3]" class="form-label">D</label>
            <input type="checkbox" name="is_true[3]" id="is_true[3]">
            <input class="form-control @error('answer[3]') is-invalid @enderror" type="text" id="answer[3]" name="answer[3]">
            @error('answer[3]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        {{-- <div class="mb-3">
            <input type="text" value="{{ $subject->grade->category }}" id="grade" name="grade" class="form-control">
        </div> --}}
        <button type="submit" class="btn btn-primary">Save question</button>
      </form>
</main>
@endsection