<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Notes</h1>
    
    @foreach ($notes as $note)
    <div class="bg-red-400">
        {{ $note->id }} <br>
        {{ $note->title }} <br>    
        {{ $note->body }} <br>
        {{ $note->date}} <br>
    </div>
    @endforeach
</body>
</html>