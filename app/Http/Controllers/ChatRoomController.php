<?php

namespace App\Http\Controllers;

use App\Events\Typing;
use App\Events\SentChat;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('chat', [
            'username' => $request->input('username')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatRoom $chatRoomm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatRoom $chatRoomm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChatRoom $chatRoomm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatRoom $chatRoomm)
    {
        //
    }

    public function sendMessage(Request $request)
    {
        event(new SentChat(
            $request->input('message'),
            $request->input('username')
        ));
        return response()->json([
            'status' => true
        ], 200);
    }

    public function sending(Request $request)
    {
        event(new Typing($request->input('username')));

        return response()->json([
            'status' => true
        ], 200);
    }
}
