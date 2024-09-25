@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title}}</h1>
    </div>
    <div class="col-lg-8">
        <form action="/teacher" method="post">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <select class="form-select" name="name" id="name">
            @foreach ($teachers as $teacher)
              <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
            @endforeach
            </select>
          </div>
        <div class="mb-3">
          <label for="subject_id" class="form-label">Subject</label>
          <select class="form-select" name="subject_id" id="subject_id">
              @foreach ($subjects as $subject)
                <option value="{{old('subject_id', $subject->id) }}">{{ $subject->name }} {{ $subject->grade->category }}</option>
              @endforeach
          </select>
        </div>
        {{-- <div class="mb-3">
            <input type="text" value="{{ $subject->grade->category }}" id="grade" name="grade" class="form-control">
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    </main>
    <script>
          //  const id = document.querySelector('#subject_id').options.selectedIndex
          //  const category = document.querySelector('#subject_id')
          //  const grade = document.querySelector('#grade')
           
          //  category.addEventListener('change',function(){
          //    grade.value = category.options[id].className
          //    console.log(grade.value)
          //    console.log(category.options[id].className)
          //  })
    </script>
    
@endsection