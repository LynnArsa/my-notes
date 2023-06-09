<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Notes</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @vite('resources/css/app.css')
</head>

<body class="font-poppins">
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
        <div class="container w-1/2">
            <div class="m-48">
                <img class="max-w-[550px] mx-auto" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Write.png">
                <p class="font-bold text-center text-[32px] pt-12">Unleash your imagination and express yourself through words.</p>
            </div>
        </div>
        <div class="container w-1/2  flex flex-col">
            <div class="mx-auto mt-20">
                <textarea class="border border-secondary rounded-md" type="text" name="title" rows="2" cols="120" placeholder="Title" maxlength="25"></textarea>
            </div>
            <div class="mx-auto">
                <textarea class="border border-secondary rounded-md" type="text" name="body" rows="30" cols="120" placeholder="Body"></textarea>
            </div>
            <div class="mx-auto p-12">
                <button type="submit" class="px-[55px] py-[16px] bg-secondary rounded-full flex hover:bg-primary">
                    <img class="max-w-[22px]" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Add%20White.png">
                    <p class="text-white font-bold px-2">Add</p>
                </button>
            </div>
        </div>
@yield('content')
</form>

    </div>
</body>
</html>