@extends('layouts.dashboard.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>
    <a href="/register" class="btn btn-primary mb-3">Create new User</a>
    <div class="table-responsive col-lg-8">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
              <a href="/users/{{ $user->id }}" class="btn btn-info"><span data-feather="eye"></span></a>
              <a href="/users/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
              <a href="" class="btn btn-danger"><span data-feather="slash"></span></a>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    {{ $users->links() }}
  </main>
  @endsection