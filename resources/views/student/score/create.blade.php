@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="col-lg-8">
        <form action="/student/score" method="post">
            @csrf
            @foreach ($test->questions as $question )
            <div class="mb-3">
                <label for="question" class="form-label">{{ $question->question }}</label>
            </div>
            @foreach ($question->answers as $answer)
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="answer" id="answer">
                <label class="answer" for="answer">
                    {{ $answer }}
                </label>
            </div>          
            @endforeach
            @endforeach
        </form>
</main>
@endsection