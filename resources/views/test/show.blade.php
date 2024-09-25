@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="col-lg-8">
        @if(session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Test name</label>
            <input class="form-control" type="text" id="name" readonly value="{{ $test->name }}">
        </div>
        @can('student')
        <form action="/score" method="post">
            <input type="hidden" name="test_id" value="{{ $test->id }}">
            <input type="hidden" name="student_id" value="{{ $student[0]->id }}">
            <input type="hidden" name="is_done" value="{{ true }}">
            @csrf
            @foreach ($questions as $question)
            <div class="mb-3">
                <label for="" class="form-label">{{ $loop->iteration }}. {{ $question->question }}</label>
                <input class="form-control" name="question_id" id="question_id" type="hidden" value="{{ $question->id }}">
                <ol class="list-group">
                    @foreach ($answers as $answer)
                    @if ($answer->question->id == $question->id)
                        @if ($answer->is_true)
                        <input class="form-control" type="hidden" name="correct_answer[{{ $question->id }}]" id="answer" value="{{$answer->answer}}">
                        @endif
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="answer" value="{{ $answer->answer }}">
                        <label class="answer" for="[{{ $question->id }}]">
                            {{ $answer->answer }}
                        </label>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endcan

        @can('teacher')
        @foreach ($questions as $question)
        <div class="mb-3">
            <label for="" class="form-label">{{ $question->question }}</label>
            <ul>
                @foreach ($answers as $answer)
                @if ($answer->question->id == $question->id)
                <li>{{ $answer->answer }}
                    @if ($answer->is_true)
                        ✔
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        @endforeach
        <div class="mb-3">
            <a href="/test" class="btn btn-warning">
                Back
            </a>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="myCollapse">
                Add Question
            </button>
        </div>
        <div class="mb-3">
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="/question" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="hidden" name="test_id" value="{{ $test->id }}">
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
                    <button type="submit" class="btn btn-primary">Save question</button>
                  </form>
                </div>
              </div>
        </div>
        @endcan
    </div>
</main>
<script>
    const collapse = document.getElementById('myCollapse')
    const collapseBox = document.getElementById('collapseExample')
    const input = collapseBox.querySelectorAll('input')
    const button = collapseBox.querySelector('.btn')
    
    collapse.addEventListener('click',event=>{
        collapse.classList.add('d-none')
    })
    
    // button.addEventListener('click',event=>{
        // event.preventDefault()
        // input.forEach(element => {
        //     if(element.querySelector('.is-invalid')){
        //         collapseBox.classList.remove('collapse')
        //         collapseBox.classList.add('collapse.show')
        //     }
        // });
        
            // if(e.querySelector('.is-invalid')){
                // alert('ok')    
            // }        
    // })
</script>
@endsection