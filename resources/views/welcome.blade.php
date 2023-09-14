@extends('layout')

@section('main')
    <div class="flex flex-col justify-center items-center w-[inherit] h-[inherit]">
        {{-- <div> --}}
            <h2 class='text-5xl font-bold underline text-orange-200	'>Welcome to KingsChat</h2>
            <a href="{{route('user.create')}}" class="w-[250px] h-[40px] border-solid border-2 border-sky-200 m-[20px] p-[.5rem] flex justify-center items-center text-stone-500 ">Sign up for KingsChat</a>
        {{-- </div> --}}
        
    </div>
@endsection
