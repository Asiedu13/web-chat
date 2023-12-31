<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePersonRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registration');
    }


    public function login(Request $request)
    {
        $validatedRequest = Validator::make($request->all(), 
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validatedRequest->fails())
        {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validatedRequest->errors(),
                ], 401
            );
        }

        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Invalid email or password',
                ], 401
            );
        }
        $user = Person::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $user->createToken('API_TOKEN')->plainTextToken,
            'data' => $user
        ]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = new Person();
        $user->email = strip_tags($request->input('email'));
        $user->password = strip_tags(Hash::make($request->input('password')));
        
        $user->save();

        return redirect()->route('chat.index', ['username' => $user->email]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
