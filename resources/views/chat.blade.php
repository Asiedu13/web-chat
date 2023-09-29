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
      <main class="w-[100vw] h-[100vh] flex justify-around items-center border-solid border-2 border-slate-200 items-end">
        <div class=" h-[400px] w-[600px] flex flex-col justify-center items-center">
            <h2 class='text-5xl font-bold text-orange-200'>KingsChat</h2>
            <p class="text-stone-400">Conversations with your loved ones in new way</p>
        </div>
        <div class="rounded-xl w-[700px] h-[700px] border-solid border-2 border-slate-200 my-[10px] mx-[10px] ">
            <header class="border-solid border-y-2 border-slate-200 h-[85px] p-[1rem]">
                <h2 class="text-stone-400 capitalize">{{$username}}</h2>
                <p id="user_status" class="m-[10px] "></p>
            </header>
            
            {{-- Chats display --}}
            <section id='display-chat' class=" bg-orange-200 w-[696px] h-[540px] flex flex-col overflow-auto ">
                
            </section>
            
            {{-- Input section --}}
            <section>
                <div class="flex">
                        <input id ='message' class="h-[70px] w-[580px] p-[1rem] focus:outline-none" type="text" name='message' placeholder="type here..."  />
                        
                        <button id='send' class="border-solid border-x-2 border-slate-200 flex-1">Send</button>
                </div>
            </section>
        </div>
      </main>
    </body>
</html>
