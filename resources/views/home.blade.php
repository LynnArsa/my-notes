<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App - Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">Welcome to the Notes App</h1>
        
        @foreach ($notes as $note)
        <div class="bg-red-400">
            {{ $note->id }} <br>
            {{ $note->title }} <br>    
            {{ $note->body }} <br>
            {{ $note->date}} <br>
        </div>
        @endforeach

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-semibold mb-2">Create a Note</h2>
                <p>Create a new note to store your thoughts and ideas.</p>
                <a class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 mt-4 inline-block">Create Note</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-semibold mb-2">View Notes</h2>
                <p>View and manage your existing notes.</p>
                <a class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 mt-4 inline-block">View Notes</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-semibold mb-2">About</h2>
                <p>Learn more about the Notes App and its purpose.</p>
                <a class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 mt-4 inline-block">About</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
