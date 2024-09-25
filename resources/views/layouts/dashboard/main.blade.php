<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>{{ $title }}</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
    

<header class="navbar sticky-top bg-danger p-3 flex-md-nowrap shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="navbar-link px-3 py-1 rounded bg-danger border-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>  
    </li>
  </ul>
</header>
<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary h-auto h-lg-100">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard')?'active':'text-dark' }}" aria-current="page" href="/dashboard">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="monitor"></i>
                  </td>
                  <td>
                    Dashboard
                  </td>
                </table>
              </a>
            </li>
            @can('admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('users*')?'active':'text-dark' }}" href="/users">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="users"></i>
                  </td>
                  <td>
                    Users
                  </td>
                </table>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('grade*')?'active':'text-dark' }}" href="/grade">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="layers"></i>
                  </td>
                  <td>
                    Grades
                  </td>
                </table>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('subject*')?'active':'text-dark' }}" href="/subject">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="book-open"></i>
                  </td>
                  <td>
                    Subjects
                  </td>
                </table>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('teacher*')?'active':'text-dark' }}" href="/teacher">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="user-plus"></i>
                  </td>
                  <td>
                    Teacher
                  </td>
                </table>
              </a>
            </li>
            @endcan
            @can('teacher')  
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('student*')?'active':'text-dark' }}" href="/student">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="user"></i>
                  </td>
                  <td>
                    Student
                  </td>
                </table>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('post*')?'active':'text-dark' }}" href="/post">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="mail"></i>
                  </td>
                  <td>
                    News
                  </td>
                </table>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('test*')?'active':'text-dark' }}" href="/test">
                <table cellpadding='4'>
                  <td>
                    <i data-feather="file-text"></i>
                  </td>
                  <td>
                    Test
                  </td>
                </table>
              </a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 text-dark">
                  <table cellpadding='4'>
                    <td>
                      <i data-feather="log-out"></i>
                    </td>
                    <td>
                      Logout
                    </td>
                  </table>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @yield('container')
  </div>
</div>
<script>
  feather.replace();
</script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
