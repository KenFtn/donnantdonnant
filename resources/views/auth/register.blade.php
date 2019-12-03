@extends('layouts.app')

@section('content')

    <div class="">{{ __('Register') }}</div>
        <div class="">
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
                    <label for="password" class="">{{ __('Password') }}</label>
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
                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                            
                </div>
            </form>
        </div>
@endsection
