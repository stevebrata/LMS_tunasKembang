@extends('layouts.dashboard.main')

@section('container')
@if (!$teachers->count())
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>
<div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
  Teacher still empty please add a teacher!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<a href="/teacher/create" class="btn btn-primary mb-3">Create new Teacher</a>
</main>
@else
  
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

      <a href="/teacher/create" class="btn btn-primary mb-3">Create new Teacher</a>
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
          @foreach ($teachers as $teacher)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->subject->grade->category }}</td>
            <td>{{ $teacher->subject->name }}</td>
            <td>
              <a href="/teacher/{{ $teacher->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
              <a href="/teacher/{{ $teacher->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
              <form action="/teacher/{{ $teacher->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="slash" ></span></button>
              </form>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    {{ $teachers->links() }}
  </main>
@endif
@endsection