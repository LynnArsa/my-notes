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
<form method="POST">
    @csrf

    @if ($errors->any())
        <div>
            <div>
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div>
    <label>Title</label>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <label>Body</label>
        <input type="text" name="body" placeholder="Body">
    </div>
    <div>
        <!-- <a href="{{ url('homepage') }}">
        <button class="px-[55px] py-[16px] bg-red rounded-lg">
          <img class="max-w-[22px] rotate-45" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Add%20White.png">
          <p class="text-white font-bold">Cancel</p>
        </button>
        </a> -->
        <button type="submit" class="px-[55px] py-[16px] bg-secondary rounded-lg">
          <img class="max-w-[22px]" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Add%20White.png">
          <p class="text-white font-bold">Add</p>
        </button>
    </div>
    @yield('content')
</form>

<div class="flex items-center justify-center">
    <div id="saveButtonContainer">
    </div>
  </div>

</body>
</html>