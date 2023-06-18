@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="">
                <div class="font-extrabold text-3xl flex justify-center items-center">{{ __('Register') }}</div>

                <div class="flex justify-center items-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="pt-8">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="rounded-lg p-3 px-16 shadow-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="rounded-lg p-3 px-16 shadow-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="rounded-lg p-3 px-16 shadow-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="rounded-lg p-3 px-16 shadow-md" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="flex justify-center items-center">
                            <div class="pt-10">
                                <button type="submit" class="px-[55px] py-[16px] bg-secondary rounded-lg">
                                    <p class="text-white font-bold">{{ __('Register') }}</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pt-10 flex justify-center items-center">
                    <p>Already have an Account?</p>
                    <a class="text-secondary font-bold underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
