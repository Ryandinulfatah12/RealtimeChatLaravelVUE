<?php

namespace App\Http\Controllers;
use App\Message;
use Auth;
use Illuminate\Http\Request;
use App\Events\ChatCreated;

class ChatController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('chat.index');
    }

    public function getMessages()
    {
    	return Message::with('user')->orderBy('id','desc')->take(10)->get();
    }

    public function postMessage(Request $request)
    {
    	$message = Message::create([
    		'subject'=> $request->subject,
    		'user_id'=> Auth::user()->id
    	]);
        broadcast(new ChatCreated($message))->toOthers();

        return $message;
    }
}
