@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title}}</h1>
  </div>
  @can('student')
  @if(!$tests->count())
    
  <div class="alert alert-warning alert-dismissible fade show col-lg-8" role="alert">
    no test for you!!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @else
  @if (session()->has('score'))
  <div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
    {{ session('score') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Grade</th>
          <th scope="col">Subject</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        @if ($student->name == auth()->user()->name)
          @foreach ($tests as $test)
              @if ($test->subject->grade_id == $student->grade->id)
              <tr id="wrap">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $test->name }}</td>
                <td>{{ $test->subject->grade->category }}</td>
                <td>{{ $test->subject->name }}</td>
                @foreach ($scores as $score)
                @if ($score->test_id === $test->id && $score->student_id === $student->id)
                <td id="score">
                  {{ $score->score }}
                </td>
                @endif
                @endforeach
                <td id="action">
                  <a href="/test/{{ $test->id }}" class="btn btn-info "><span data-feather="check-square"></span></a>
                </td>
              </tr>
              @endif
            @endforeach
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
  @endcan
@can('teacher')
  @if(!$tests->count())
<div class="alert alert-warning alert-dismissible fade show col-lg-8" role="alert">
    Test still empty please add a test!!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <a href="/test/create" class="btn btn-primary mb-3">Create new Test</a>
    @else
    @if (session()->has('success'))
  <div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <a href="/test/create" class="btn btn-primary mb-3">Create new Test</a>
    <div class="table-responsive col-lg-8">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Subject</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (auth()->user()->role === 'teacher')
            @foreach ($tests as $test)
            @if (auth()->user()->name === $test->subject->teacher->name)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $test->name }}</td>
              <td>{{ $test->subject->grade->category }}</td>
              <td>{{ $test->subject->name }}</td>
              <td>
                <a href="/test/{{ $test->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
                <a href="/test/{{ $test->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                <form action="/test/{{ $test->id }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="slash" ></span></button>
                </form>
              </td>
            </tr>
            @endif
            @endforeach
          @else
            @foreach ($tests as $test)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $test->name }}</td>
              <td>{{ $test->subject->grade->category }}</td>
              <td>{{ $test->subject->name }}</td>
              <td>
                <a href="/test/{{ $test->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
                <a href="/test/{{ $test->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                <form action="/test/{{ $test->id }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="slash" ></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    @endif
@endcan
<script>
  const wraps =document.querySelectorAll('#wrap')
  wraps.forEach(wrap => {
    const score = wrap.querySelector('#score')
    const action = wrap.querySelector('#action')
    console.log(score)
    if(score){
        action.classList.add('d-none')
    }
  })
    // console.log('hai')
</script>
</main>
@endsection