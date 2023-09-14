@extends('layout')

@section('main')
    <div class="border-1 border-solid border-slate-200 h-[600px] w-[90vw] flex flex-col items-center  mt-[70px] m-[auto]">
        {{-- <div> --}}
            <h2 class='text-3xl font-bold underline my-[30px]'>Sign Up</h2>
            
            <form action="{{route('user.store')}}" method="POST" class="shadow-2xl h-[400px] w-[400px] p-[2rem] rounded-lg">
                @csrf
                <div class="flex flex-col my-[10px]">
                    <label class="my-[10px]" for="email">Email</label>
                    <input class="border-solid border-2 border-slate-200 rounded-sm h-[40px] p-[10px]" type="email" name="email" id="email" value="{{old('email')}}" placeholder="example@example.com">

                    @error('email')
                        <p class="text-red-500 font-semibold text-sm"> {{$message}} </p>
                    @enderror
                </div>
                
                <div class="flex flex-col my-[20px]">
                    <label class="my-[10px]" for="password">Password</label>
                    <input class="border-solid border-2 border-slate-200 rounded-sm h-[40px] p-[10px]" value="{{old('password')}}" type="password" name="password" id="password" placeholder="password">


                    @error('password')
                        <p class="text-red-500 font-semibold text-sm"> {{$message}} </p>
                    @enderror
                </div>
                
                <div>
                    <button class="w-[338px] h-[40px] my-[20px] bg-slate-800 text-[#fff] rounded-sm" type="submit">Create account</button>
                </div>
            </form>
        {{-- </div> --}}
    </div>
@endsection
