<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'My Notes') }}</title>

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="font-poppins">

    <div class="justify-center items-center flex">
        <div class="flex p-40">
            <img class="bg-cover w-[700px] rounded-3xl" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Simple%20BG.png">
            <div class="flex w-1/2 px-48">
                <main class="pt-8 ">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    

</body>
</html>
