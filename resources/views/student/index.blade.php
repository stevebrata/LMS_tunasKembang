@extends('layouts.dashboard.main')

@section('container')
@if (!$students->count() )
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>
<div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
  Student still empty please add a student!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<a href="/student/create" class="btn btn-primary mb-3">Create new Student</a>
</main>

@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

      <a href="/student/create" class="btn btn-primary mb-3">Create new Student</a>
    <div class="table-responsive col-lg-8">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NISN</th>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->NISN }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->grade->category }}</td>
            <td>
              <a href="/student/{{ $student->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
              <a href="/student/{{ $student->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
              <form action="/student/{{ $student->id }}" method="POST" class="d-inline">
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
  </main>
@endif
@endsection