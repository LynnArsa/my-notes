<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Notes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <p>Hello This is Edit Page</p>
<form method="POST" action="{{ route('notes.edit', $note->id) }}">

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
    <label>Title</label>
        <input type="text" name="title" value="{{ $note->title }}" placeholder="Title">
    </div>
    <div>
        <label>Body</label>
        <input type="text" name="body" value="{{ $note->body }}" placeholder="Body">
    </div>
    <div>
        <button type="submit">Save Note</button>
    </div>
</form>

</body>
</html>

