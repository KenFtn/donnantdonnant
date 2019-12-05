<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Donnant Donnant</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/star-rating-svg.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@request('register', 'login')
@else
    <div class="menubtn">
        <div class="baton"></div>
        <div class="baton"></div>
        <div class="baton"></div>
    </div>
    <div class="menumobile">
        <nav>
            <div class="a">
                <a class="aLogo" href="{{ url('/') }}">
                    <img src={{ asset('img/logo.png') }} alt="Logo donnant donnant">
                </a>
                <ul class="fullnav">
                    <li><a class=""href={{route('annonces.create')}}>Poster une annonce</a></li>
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
                        <a class="" href="{{ route('user.show', Auth::user()->slug)}}" v-pre>
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
                        <li><a href="">J'ai besoin d'aide</a></li>
                        <li><a href="">Je propose mon aide</a></li>
                        <li><a href="">Comment ça marche ?</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="app">
        <nav>
            <div class="c">
                <a class="aLogo" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo donnant donnant">
                </a>
                <ul class="">
                <li><div class="poster"><a href={{route('annonces.create')}}>Poster une annonce</a></div></li>
                        <!-- Authentication Links -->
                    @guest
                        <li class="">
                            <a class="login" href="{{ route('login') }}">Connexion</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="login" href="{{ route('register') }}">Inscription</a>
                            </li>
                        @endif
                        @else
                        <div class="bonjour">
                            <p>Bonjour, <span class="userName">{{ Auth::user()->name }} !</span><i class="fas fa-sort-down"></i></p>
                            <img src="{{asset('img/' . Auth::user()->avatar)}}" alt="Photo de profil">
                            <div class="miniMenu">
                                <a class="" href="{{ route('user.show', Auth::user()->name)}}" v-pre>
                                    Mon profil<span class="caret"></span>
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
                            </div>
                        </div>        
                        @endguest
  
                    </ul>
                </div>
            </div>
        </nav>
@endrequest
        <main>
            @yield('content')
        </main>
        @request('register', 'login')
        @else
        <footer>
        <img src="{{ asset('img/footerdogopacity.png') }}" alt="">
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
    @endrequest
    </div>
    <script src="https://kit.fontawesome.com/0b3a13e271.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
