<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use App\User;

class ConversationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('messages.allmessages');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        //$reciever_id = $data['reciever'];
        $reciever_id = $data['user_id'];
        $reciever = User::whereId($reciever_id)->first();
        $conversations = auth()->user()->conversations;
        foreach ($conversations as $conversation){
            foreach ($conversation->users as $user){
                if($user->id == $reciever_id){
                    $content = $data['content'];
                    $message = $conversation->addMessage($content,$conversation->id,auth()->id());
                    return back();
                }
            }
        }

        $conversation = Conversation::create([]);

        $conversation->users()->attach([auth()->id()]);
        $conversation->users()->attach([$reciever_id]);


        $content = $data['content'];
        $message = $conversation->addMessage($content,$conversation->id,auth()->id());


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $conversation = Conversation::whereId($id)->first();
        $messages = $conversation->messages;
        $user = User::whereId(auth()->id())->first();

        if(!$conversation->users->contains($user)){
            return back();
        }

        foreach ($conversation->messages as $message){
            if($message->user->id == auth()->id()){
                continue;
            }
            $message->is_seen=true;
            $message->save();
        }
        $conversation->save();

        //
        return view('messages.messages',compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMessage($id,Request $request)
    {
        //
        $data = $request->all();

        $conversation = Conversation::whereId($id)->first();
        $content = $data['content'];

        $conversation->addMessage($content,$conversation->id,auth()->id());


        return view('messages.messages',compact('conversation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
