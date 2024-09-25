@extends('layouts.dashboard.main')
@section('container')
  <div class="card m-3" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Teacher name</h5>
      <p class="card-text">{{ $teacher->name }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $teacher->subject->name }}</li>
      <li class="list-group-item">{{ $teacher->subject->grade->category }}</li>
      <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
      <a href="/teacher" class="btn btn-warning">Back</a>
    </div>
  </div>
@endsection
