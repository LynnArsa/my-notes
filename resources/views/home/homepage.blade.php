<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App - Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-poppins">
    <h1 class="text-4xl font-bold mb-4">Welcome to the Notes App</h1>
<div class="flex flex-row">
    <div class="container w-1/2">
        @foreach ($notes as $note)
        <div class="bg-body w-2/3 mx-auto p-12 m-2 rounded-lg hover:bg-secondary">
            <p class="font-bold text-2xl"> {{ $note->title }} </p><br>    
            {{ $note->body }} <br>
            {{ $note->date}} <br>
        </div>
        @endforeach
    </div>
    <div class="container w-1/2">
        <div>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_ShrsmB.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
        </div>
    </div>
</div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
