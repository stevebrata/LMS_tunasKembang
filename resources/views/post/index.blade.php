@extends('layouts.dashboard.main')

@section('container')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title}}</h1>
  </div>
  @can('student')  
  <div class="col-lg-8 d-flex flex-wrap justify-content-between">  
    @foreach ($students as $student)
      @if ($student->name === auth()->user()->name)
        @foreach ($posts as $post)
          @if ($student->grade->category === $post->subject->grade->category)
            <a href="/post/{{ $post->id }}">
              <div class="card my-3" style="width: 18rem;">
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt=" image_post ">
                <div class="card-body">  
                  <h5 class="card-title">Message</h5>
                  <p class="card-text">{{ $post->subject->name }}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">by {{ $post->subject->teacher->name }}</li>
                  <li class="list-group-item">{{ $post->body }}</li>
                  <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
                </ul>
              {{-- <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div> --}}
              </div>
            </a>
          @endif
        @endforeach
      @endif
    @endforeach
  </div>
@endcan

@can('teacher')
  @if(session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show clo-lg-8" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <a href="/post/create" class="btn btn-primary mb-3">Create new Post</a>
  <div class="col-lg-8 d-flex flex-wrap justify-content-between">
    @if (auth()->user()->role==='teacher')
      @foreach ($posts as $post)
        @if ($post->subject->teacher->name === auth()->user()->name)
          <a href="/post/{{ $post->id }}">
            <div class="card my-3" style="width: 18rem;">
              <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="...">
              <div class="card-body">  
                <h5 class="card-title">Message</h5>
                <p class="card-text">{{ $post->subject->name }} {{ $post->subject->grade->category }}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">by {{ $post->subject->teacher->name }}</li>
                <li class="list-group-item">{{ $post->body }}</li>
                <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
              </ul>
                  {{-- <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div> --}}
            </div>
          </a> 
        @endif
      @endforeach
    @else
      @foreach ($posts as $post)
        <a href="/post/{{ $post->id }}">  
          <div class="card my-3" style="width: 18rem;">
            <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="...">
            <div class="card-body">  
              <h5 class="card-title">Message</h5>
              <p class="card-text">{{ $post->subject->name }} {{ $post->subject->grade->category }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">by {{ $post->subject->teacher->name }}</li>
              <li class="list-group-item">{{ $post->body }}</li>
              <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
            </ul>
                {{-- <div class="card-body">
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div> --}}
          </div>
        </a>
      @endforeach
    @endif
  </div>
@endcan
</main>

@endsection