@extends('layouts.app') @section('content')
<div class="">
    <div class="">
        <div class="">
            <h1 class="font-bold text-5xl text-center mb-20">My <span class="text-secondary">Notes</span></h1>
            <div class="font-extrabold text-3xl flex justify-center items-center">{{ __('Login') }}</div>

            <div class="flex justify-center items-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="pt-8">
                        <label for="email" class="">{{ __('Email Address') }}</label>

                        <div class="">
                            <input
                                id="email"
                                type="email"
                                class="rounded-lg p-3 px-16 shadow-sm border border-secondary @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus />
                            @error('email')
                            <span class="mt-2 text-sm text-red flex" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-6">
                        <label for="password" class="">{{ __('Password') }}</label>

                        <div class="">
                            <input
                                id="password"
                                type="password"
                                class="rounded-lg p-3 px-16 shadow-sm border border-secondary @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="current-password" />
                            @error('password')
                            <span class="mt-2 text-sm text-red flex" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center items-center">
                        <div class="pt-10">
                            <button type="submit" class="px-[55px] py-[16px] bg-secondary rounded-full hover:bg-primary">
                                <p class="text-white font-bold">{{ __('Login') }}</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="pt-10 flex justify-center items-center">
                <p>Don't have an Account?</p>
                <a class="text-secondary font-bold underline" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
