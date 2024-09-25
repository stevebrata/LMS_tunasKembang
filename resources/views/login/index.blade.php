@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">    
    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <main class="form-signin p-3">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid
                    @enderror" id="username" placeholder="Username" value="{{ old('username') }}" autofocus>
                    <label for="email">Username</label>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class=" d-flex justify-content-center">
                    <button class="btn btn-primary w-50 py- mt-4" type="submit">Login</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection