<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}">
        --}}
        @vite('resources/css/app.css')

    </head>
    <body class="antialiased">
      <nav class="flex items-center">
        <b class="text-orange-200 p-[10px] text-2xl	">KingsChat</b>
        <ul class="flex p-[10px] ">
            <li class="flex p-[10px]">Home</li>
            <li class="flex p-[10px]">Chat</li>
            <li class="flex p-[10px]">Contacts</li>
        </ul>
      </nav>
      <div class="w-[100vw] h-[100vh]">
          @yield('main')
      </div>
    </body>
</html>
