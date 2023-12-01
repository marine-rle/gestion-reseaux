<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <title>@yield('title', 'Eval')</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('accueil.index') }}">{{ __('Accueil') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ordinateur.index') }}">{{ __('Liste des ordinateurs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('serveur.index') }}">{{ __('Liste des serveurs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reseau.index') }}">{{ __('Liste des réseaux') }}</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mt-2">
                        <li class="nav-item">
                            <a class="nav-link" href="locale/en">{{ __('English')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="locale/fr">{{ __('French')}}</a>
                        </li>
                        @auth

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <input class="nav-link" type="submit" value="{{ __('Log Out') }}">
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</body>

</html>
