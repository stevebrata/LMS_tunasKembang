<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">LMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/')?'active' :'' }}" aria-current="page" href="/">Home</a>
            </li>
              {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('grade/')?'active' :'' }}" href="/grade/index">Grade</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('student/index')?'active' :'' }}" href="/student/index">Student</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('teacher/index')?'active' :'' }}" href="/teacher/index">Teacher</a>
              </li> --}}
          </ul>
          <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">My Dashboard</a>
                </li>
                <li>
                  <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                  </form>  
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ Request::is('login')?'active' :'' }}">Login</a>
            </li>
          @endauth
          </ul>
        </div>
      </div>
    </nav>
    @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>