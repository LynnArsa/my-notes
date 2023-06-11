<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <p>Hello, this is the Edit Page</p>
    <form method="POST" action="{{ route('notes.update', $note->id) }}">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}" placeholder="Title">
        </div>
        <div>
            <label for="body">Body</label>
            <input type="text" id="body" name="body" value="{{ $note->body }}" placeholder="Body">
        </div>
        <div>
            <button type="submit">Save Note</button>
        </div>
    </form>
</body>
</html>
