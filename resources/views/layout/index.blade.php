<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/css/index.css">
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="/" class="navbar-brand">Library Management</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <ul class="navbar-nav mr-auto">
        @auth
          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
              Authors
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('author.create') }}" class="dropdown-item">New author</a>
              <a href="{{ route('author.index') }}" class="dropdown-item">All</a>
            </div>
          </li>
        @endauth
      </ul>
      <ul class="navbar-nav">
        @auth
          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
              {{ Auth::user()->name}}
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
              <form action="{{ route('logout') }}" method="post" id="logout">
                @csrf
                @method('delete')
              </form>
            </div>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('login.show') }}" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register.show') }}" class="nav-link">Register</a>
          </li>
        @endauth
      </ul>
    </div>
  </nav>
  @yield('content')
</body>
</html>