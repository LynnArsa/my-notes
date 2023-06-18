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

    <div class="m-24 rounded-lg">
        <div id="app" class="flex p-12">
            <div class="w-1/2">
                <!-- <div class="p-24 flex"> -->
                    <img class="bg-contain w-[700px] rounded-3xl" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Simple%20BG.png">
                <!-- </div> -->
            </div>
            
            <div class="w-1/2">
                <main class="p-12">
                    <h1 class="font-bold text-5xl text-center mb-16">My <span class="text-secondary">Notes</span></h1>

                    @yield('content')

                </main>
            </div>
        </div>
    </div>
    

</body>
</html>
