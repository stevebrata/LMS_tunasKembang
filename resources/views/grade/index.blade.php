@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
    <div class="table-responsive col-lg-8">
      <a href="/grade/create" class="btn btn-primary mb-3">Create new grade</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Grade</th>
            <th scope="col">Homeroom Teacher</th>
            <th scope="col">Assistant Teacher</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($grades as $grade)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $grade->category }}</td>
            <td>{{ $grade->teacher}}</td>
            <td>{{ $grade->assistant }}</td>
            <td>
              <a href="/grade/{{ $grade->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
              <a href="/grade/{{ $grade->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
              <form action="/grade/{{ $grade->id }}" method="POST" class="d-inline">
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
@endsection