<?php

namespace App\Http\Controllers;

use App\Event;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    //
    public function store(Request $request)
    {


        //dd($request->all());

        if (Input::file('picture2')) {

            $data = $request->all();

            $lala = Input::file('picture');
            $extension = Input::file('picture2')->getClientOriginalExtension();
            $destinationPath = 'img/';
            $fileName = rand(11111, 99999) . '.' . $extension;  // renaming image
            Input::file('picture2')->move($destinationPath, $fileName);

            $event = Event::create([
                'name' => request('name2'),
                'description' => request('description2'),
                'address' => request('address2'),
                'city' => request('city2'),
                'zipcode' => request('zipcode2'),
                'country' => request('country2'),
                'picture' => $fileName,
                //image

            ]);
        }

        //  dd(auth()->id())  ;
        return back();
    }

    public  function index(){


        $events = Event::latest()->get();

       // dd($events->first()->posts);
       // dd(auth()->user()->posts);

        return view('events.index',compact('events'));
    }

    public function giveNew($id,Request $request){

        $event = Event::whereId($id);

        if (Input::file('picture3')) {

            $data = $request->all();
            $lala = Input::file('picture3');
            $extension = Input::file('picture3')->getClientOriginalExtension();
            $destinationPath='img/';
            $fileName = rand(11111,99999).'.'.$extension;  // renaming image
            Input::file('picture3')->move($destinationPath, $fileName);

            $post = \App\Post::create([
                'user_id' => auth()->id(),
                'name'=> request('name3'),
                'description'=>request('description3'),
                'status'=>'sent',
                'picture'=>$fileName,

                //image

            ]);
            $tags = $data['myInputs'];

            // dd($tags);
            foreach ($tags as $eachInput) {


                $tag = \App\Tag::where('name','=',$eachInput)->first();


                if (is_null($tag)){
                    $tag = new \App\Tag();
                    $tag->name=$eachInput;
                    $tag->save();
                    // dd($tag);

                }
                $post->tags()->attach([$tag->id]);
            }
            $post->reciever_id = $id;
            $post->reciever_type= "event";
            $post->status="sent";
          //  $post->recieverType="event";

            $post->save();

        }

        return back();



    }

    public function giveExisting($id1,$id2){


        $event = Event::whereId($id1)->first();
        $post = \App\Post::whereId($id2)->first();

        $post->reciever_id=$id1;
        $post->status="sent";
        $post->reciever_type= "event";

       // dd($post);
        $post->save();

       // dd($event->posts);
        return back();

    }
}
