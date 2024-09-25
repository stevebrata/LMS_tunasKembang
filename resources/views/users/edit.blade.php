@extends('layouts.dashboard.main')

@section('container')
<div class="col-lg-8 m-3">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/users/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username',$user->username) }}">
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    {{-- <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Role" value="{{ old('role') }}">
                    <label for="role">Role</label>
                    @error('role') 
                    <div class="invalid-feedback">
                    {{ $message }}    
                    </div> 
                    @enderror --}}
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>    
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email',$user->email) }}">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary w-50 py-2 mt-4" type="submit">Edit</button>
                </div>
            </form>
        </main>
</div>
@endsection