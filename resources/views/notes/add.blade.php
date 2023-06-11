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
    Hello please create note here
<form method="post" action="">
    @csrf
    <!-- @method('PUT') -->
    <div>
    <label>Title</label>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <label>Body</label>
        <input type="text" name="body" placeholder="Body">
    </div>
    <div>
        <button type="submit">Save Note</button>
    </div>
</form>

</body>
</html>