@extends('layouts.app')

@section('content')
        <div class="mainLog">
            <div class="winLog">
                <div class="gaucheLog">
                    <div class="gtxt">
                        <p>Bienvenue !</p>
                        <p>Plus qu'une étape avant de répondre ou poster une annonce !</p>
                        <p>Vous avez changé d'avis ?</p>
                        <a href="{{ url('/') }}">Retour à L'accueil</a>
                    </div>    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#FFFFFF" fill-opacity="1" d="M0,96L34.3,128C68.6,160,137,224,206,218.7C274.3,213,343,139,411,112C480,85,549,107,617,128C685.7,149,754,171,823,149.3C891.4,128,960,64,1029,80C1097.1,96,1166,192,1234,192C1302.9,192,1371,96,1406,48L1440,0L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>

                    <img src="/img/group.jpg" alt="">
                    <div class="forme">
                    </div>

                </div>
                <div class="droiteLog">
                    <a class="aLogo" href="{{ url('/') }}">
                        <img src="./img/logo.png" alt="Logo donnant donnant">
                    </a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="">
                            <label for="name" class="">{{ __('Name') }}</label>
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="">{{ __('Password') }}</label><br>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="">
                            <input id="city_id" type="hidden" name="city_id" value="21345">
                        </div>

                        <div class="">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label><br>
                            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="btn">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>   
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
