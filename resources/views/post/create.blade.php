@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title}}</h1>
  </div>
  <div class="col-lg-8">
    <form action="/post" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="subject_id" class="form-label">Subject</label>
        <select class="form-select" name="subject_id" id="subject_id">
          @if (auth()->user()->role=== 'teacher')  
            @foreach ($subjects as $subject)
              @if ($subject->teacher->name === auth()->user()->name)  
                <option value="{{old('subject_id', $subject->id) }}">{{ $subject->name }} {{ $subject->grade->category }} {{ $subject->teacher->name }}</option>
              @endif
            @endforeach
          @else
            @foreach ($subjects as $subject)
            <option value="{{old('subject_id', $subject->id) }}">{{ $subject->name }} {{ $subject->grade->category }} {{ $subject->teacher->name }}</option>
            @endforeach
          @endif  
        </select>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" name="image" id="image" @error('image') is-invalid @enderror>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" name="message" @error('message')
          is-invalid @enderror value="{{ old('message') }}" id="message" rows="5" style="resize: none"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>
    
@endsection