<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Donnant Donnant</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav>
            <div class="c">
                <a class="aLogo" href="{{ url('/') }}">
                    <img src="./img/logo.png" alt="Logo donnant donnant">
                </a>
                <ul class="">
                <li><a href={{route('annonces.create')}}>Poster une annonce</a></li>
                        <!-- Authentication Links -->
                    @guest
                        <li class="">
                            <a class="" href="{{ route('login') }}">Connexion</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="" href="{{ route('register') }}">Inscription</a>
                            </li>
                        @endif
                        @else
                            <li class="">
                            <a class="" href="{{ route('user.show', Auth::user()->name)}}" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="">
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Se deconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
  
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <footer>
            <img src="./img/footerdogopacity.png" alt="">
            <div class="left">
                <p>Donnant Donnant, une bonne raison de s'entraider !</p>
                <p>Donnant Donnant est un réseau d'entraide qui met en relation des personnes afin qu'elles puissent se rendre des services de manière totalement gratuite à hauteur de leur compétences.</p>
                <p>Donnant Donnant, 4 rue fictive , 62000 Calais. <br>
                    0320304020<br>contact@donnant-donnant.fr</p>
            </div>
            <div class="right">
                <p>Donnant Donnant</p>
                <ul>
                    <li><i class='fas fa-arrow-right'></i><a href="">Inscription</a></li>
                    <li><i class='fas fa-arrow-right'></i><a href="">Poster une annonce</a></li>
                    <li><i class='fas fa-arrow-right'></i><a href="">J'ai besoin d'aide</a></li>
                    <li><i class='fas fa-arrow-right'></i><a href="">Je propose mon aide</a></li>
                    <li><i class='fas fa-arrow-right'></i><a href="">Comment ça marche ?</a></li>
                </ul>
            </div>
            <p class="copyright">copyright © Donnant-Donnant 2019. All rights reserved</p>
        </footer>
    </div>
</body>
</html>
