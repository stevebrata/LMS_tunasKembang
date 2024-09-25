@extends('layouts.dashboard.main')

@section('container')
  <div class="card m-3" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Name</h5>
      <p class="card-text">{{ $user->name }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $user->role }}</li>
      <li class="list-group-item">{{ $user->email }}</li>
      <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
      <a href="/subject" class="btn btn-warning">Back</a>
    </div>
  </div>
@endsection