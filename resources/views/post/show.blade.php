@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt=" image_post ">
        <div class="card-body">  
        <h5 class="card-title">Message</h5>
        <p class="card-text">{{ $post->subject->name }}</p>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">by {{ $post->subject->teacher->name }}</li>
        <li class="list-group-item">{{ $post->body }}</li>
        <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
        <li class="list-group-item"><a href="/download?name={{ $post->image }}" class="btn btn-primary">Download</a></li>
        </ul>
    {{-- <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div> --}}
    </div>
</main>
@endsection