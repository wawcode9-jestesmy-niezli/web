<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <title>Hi! Warsaw</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <script src="/js/app.js" defer></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Hi! Warsaw</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Moje miejsca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/places">Lista miejsc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/warsaw-ranking">Ranking Warszawiaka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/place-ranking">Ranking miejsc</a>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('logout') }}">
                                {{ \Auth::user()->name }}
                                <i class="fa fa-trophy" aria-hidden="true"></i>
                                (Wyloguj)
                            </a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Zaloguj</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Zarejestruj</a>
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
        <div class="col text-center" style="padding: 15px;">
            © 2019 <strong>Hi! Warsaw</strong> developed by "Jesteśmy nieźli" from wawcode9
        </div>
    </div>
</div>

<script>
if (location.protocol != 'https:')
{
 location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
}
</script>

</body>
</html>
