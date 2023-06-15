<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Notes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <nav>
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
            <div class="justify-items-end">
              <div class="flex-shrink-0">
                <span class="font-bold text-[24px]">My <span class="text-secondary">Notes.</span></span>
              </div>
            </div>
          </div>
        </div>
    </nav>

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

    <div class="flex flex-row">
        <div class="container w-1/2  flex flex-col">
            <div class="mx-auto">
                <input class="p-2 px-96" type="text" name="title" placeholder="">
            </div>
            <div class="mx-auto">
                <input class="p-48 px-96" type="text" name="body" placeholder="">
            </div>
            <div class="mx-auto p-12">
                <button type="submit" class="px-[55px] py-[16px] bg-secondary rounded-lg flex">
                    <img class="max-w-[22px]" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Add%20White.png">
                    <p class="text-white font-bold">Add</p>
                </button>
            </div>
        </div>
@yield('content')
</form>

        <div class="container w-1/2">
            <div class="m-16">
                <img class="max-w-[550px] mx-auto" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Write.png">
            </div>
        </div>
    </div>
</body>
</html>