<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function messages(Request $request)
    {
        $roomId=1;
        return ChatMessage::where('chat_room_id',$roomId)
            ->with('user')
            ->orderBy('created_at','DESC')
            ->get();
    }

    public function newMessage(Request $request)
    {
        $roomId=1;
        $newMessage = new ChatMessage();
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = $roomId;
        $newMessage->message = $request->input('message');
        $newMessage->save();
        broadcast(new NewChatMessage());
        return $newMessage;
    }
}
