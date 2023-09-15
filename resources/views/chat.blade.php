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
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
      {{-- Status section --}}

      {{-- Chat section --}}
      <main class="w-[100vw] h-[100vh] flex flex-col border-solid border-2 border-slate-200 items-end">
        <div class="rounded-xl w-[700px] h-[700px] border-solid border-2 border-slate-200 my-[10px] mx-[10px] ">
            <header class="border-solid border-y-2 border-slate-200 h-[85px] p-[1rem]">
                <h2>{{$username}}</h2>
                <p id="user_status" class="m-[10px] "></p>
            </header>
            
            {{-- Chats display --}}
            <section id='display-chat' class=" bg-orange-200 w-[696px] h-[540px] flex flex-col overflow-auto ">
                
                {{-- <section id='you' class='w-[200px] bg-orange-500'>

                </section>

                <section id='me' class="bg-orange-500 w-[200px]">

                </section> --}}
            </section>
            
            {{-- Input section --}}
            <section>
                <div class="flex">
                        <input id ='message' class="h-[70px] w-[580px] p-[1rem]" type="text" name='message' placeholder="type here..."  />
                        
                        <button id='send' class="border-solid border-x-2 border-slate-200 flex-1">Send</button>
                </div>
            </section>
        </div>
      </main>
    </body>
</html>
