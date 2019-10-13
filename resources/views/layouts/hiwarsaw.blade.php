<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <title>HI! Warsaw</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">HI! Warsaw</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav mr-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/places">Places</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#/warsaw-ranking">Warsaw ranking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#/place-ranking">Place ranking</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
         </div>

                
            </nav>
        </div>
    </div>
</div>

@yield('content')

<div class="container mt-3">
    <div class="row">
        <div class="col text-center" style="padding: 15px 0;">
            © 2019 <strong>Hi! Warsaw</strong> developed by "Jesteśmy nieźli" from wawcode9
        </div>
    </div>
</div>

</body>
</html>