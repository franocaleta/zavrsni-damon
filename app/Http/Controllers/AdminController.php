<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function delivered($id)
    {
        if(auth()->user()->isAdmin == false){
            return back();
        }

        $post = Post::whereId($id)->first();

        $post->status='delivered';

        $post->save();

        $user = $post->user;
        $user->rating = $user->rating+10;
        $user->save();

        $user = $post->reciever;
        $user->rating = $user->rating-5;
        $user->save();

        //dd($post);

        return back();
       // return view('admin.index',compact('posts'));

        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->isAdmin == false){
            return back();
        }

        $conversations = auth()->user()->conversations;
        $br=0;

        foreach ($conversations as $conversation){

            $messages = $conversation->messages;

            foreach ($messages as $message){
                if($message->is_seen == false ){
                    if($message->user->id == auth()->user()->id){
                        continue;
                    }
                    $br = $br +1;
                    break;
                }
            }
        }
        //  dd($conversation);


    //  dd($posts);

        $posts = Post::latest()->where('status','=','sent')->where('reciever_type','=','user')->get();


      return view('admin.index',compact('posts','br'));

        //
    }
}
