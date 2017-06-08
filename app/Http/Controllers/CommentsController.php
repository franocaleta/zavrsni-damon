<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id){

        $post = Post::whereId($id)->first();


        $userid = auth()->id();

        $this->validate(request(),['content'=>'required|min:2']);

        $post->addComment(request('content'),$id,$userid);

       // dd($post);

        return back();

    }



    public function destroy($id)
    {
        //
    }
}
