<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function distance($lat1, $lon1, $lat2, $lon2) {

        $theta = $lon1 - $lon2;

        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));

        $dist = acos($dist);

        $dist = rad2deg($dist);

        $miles = $dist * 60 * 1.1515;

        //dd($miles);
        return round($miles, 2);

        }

    public function pickRandom($id){

        $post = Post::whereId($id)->first();

        $candidates = $post->candidates->sortByDesc('rating');
        //dd($candidates);

        $count = count($candidates);
        $totalRating = 0;

        foreach ($candidates as $candidate){
            $totalRating = $totalRating + $candidate->rating;
        }

        $avg = $totalRating/$count;
        //dd($avg);

        foreach ($candidates as $candidate){
            $candidate->rating = ($candidate->rating + $avg) * rand(1,10);
        }

        //dd($candidates);

        $candidates = $post->candidates->sortByDesc('rating');

        $user = $candidates->first();

        $post->reciever_id = $user->id;

        $post->reciever_type= "user";

        $post->status = "sent";

        $post->save();

        return back();

    }


    public function second($id2)
    {

        if ($id2 == null){
            $id2 = 1;
        }

        $id = auth()->id();

        $user = User::whereId($id)->first();
        //
        $address = $user->address.' '.$user->country;;

        $zipcode = $user->zipcode;

	

        if($id2 < 3 && Post::count() > 12) {
            // Get lat and long by address
            $address = $address; // Google HQ
            $prepAddr = str_replace(' ', '+', $address);
            $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
            $output = json_decode($geocode);
            $latitude = $output->results[0]->geometry->location->lat;
            $longitude = $output->results[0]->geometry->location->lng;

            $postsh = Post::provide($id);
			
			

            $posts = new Collection();
            foreach ($postsh as $post) {
                $addr2 = $post->user->address;
                $prepAddr2 = str_replace(' ', '+', $addr2);
                $geocode2 = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $prepAddr2 . '&sensor=false');
                $output2 = json_decode($geocode2);

                $latitude2 = $output2->results[0]->geometry->location->lat;
                $longitude2 = $output2->results[0]->geometry->location->lng;

				//dd("maci");

                if ($this->distance($latitude, $longitude, $latitude2, $longitude2) < 10) {

                        if ($post->candidates->contains(auth()->id()) && ($post->status != "free")) {
                            continue;
                        }
                        $posts->add($post);


                }

            }
            $posts = $posts->forPage($id2, 6)->all();
			
			
            return view('secondpage/second', compact('posts', 'user', 'id2'));
        }


        $posts = new Collection();
        $postsh = Post::provide($id);
        foreach ($postsh as $post){
            if($post->candidates->contains(auth()->id()) || ($post->status != "free")){
                continue;
            }
            $posts->add($post);
        }
		//dd($postsh);
        if(count($posts) < (6*(1+$id2))){
            return view('secondpage/second',compact('posts','user','id2'));
        }
        $posts = $posts->forPage($id2, 6)->all();

		

        return view('secondpage/second',compact('posts','user','id2'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();

        $user = User::whereId($id)->first();
        //
        $address = $user->address.' '.$user->country;;

        $zipcode = $user->zipcode;

		

        // Get lat and long by address
        $address = $address; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        //

        //get nearest posts/latest posts/sth else



        $posts = Post::latest()->get();



        return view('posts.index',compact('posts','user'));

    }

    public function pick(Request $request, $id, $userid){

        $post = Post::whereId($id)->first();

        $post->status='sent';

        //poslan useru.
        $user = User::whereId($userid)->first();

        $post->reciever_id=$userid;
        $post->reciever_type= "user";

        $post->save();

        dd($post);

        return back();

    }

    public function search(Request $request ){


        $id2 = $request->id2;
        if($id2 == null){
            $id2 = 1;
        }


        if($request->has('titlesearch')){
            $tags = Tag::search($request->titlesearch)
                ->paginate(9);
        }else{
            $tags = Tag::paginate(9);
        }
        $posts = new Collection();

        foreach ($tags as $tag){
            foreach ($tag->posts as $post){
                if($post->id == auth()->id()){
                    continue;
                }
                if($post->candidates->contains(auth()->id()) && ($post->status != "free") ){
                    continue;
                }
                $posts->add($post);
            }
        }

        //dd($posts->items());

       // dd($posts);
        $posts = $posts->forPage($id2, 6)->all();

        $id = auth()->id();

        $user = User::whereId($id)->first();

        return view('secondpage/second',compact('posts','user','id2'));


    }


    public function demand(Request $request,$id){

        $data = $request->all();

        $useid = auth()->id();

        //$user = User::whereId($id)->first();

        $post = Post::whereId($id)->first();

      //  dd($post);
        $post->candidates()->attach([$useid]);

        $post->save();

        return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (Input::file('picture')) {

            $data = $request->all();
            $lala = Input::file('picture');
            $extension = Input::file('picture')->getClientOriginalExtension();
            $destinationPath='img/';
            $fileName = rand(11111,99999).'.'.$extension;  // renaming image
            Input::file('picture')->move($destinationPath, $fileName);

            $post = Post::create([
                'user_id' => auth()->id(),
                'name'=> request('name'),
                'description'=>request('description'),
                'status'=>'free',
                'picture'=>$fileName,

                //image

            ]);
            $tags = $data['myInputs'];

           // dd($tags);
            foreach ($tags as $eachInput) {


                $tag = Tag::where('name','=',$eachInput)->first();


                if (is_null($tag)){
                    $tag = new Tag();
                    $tag->name=$eachInput;
                    $tag->save();
                   // dd($tag);

                }
                $post->tags()->attach([$tag->id]);
            }
            $post->save();


          //  dd($lala);
        }

        //  dd(auth()->id())  ;
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

       //$posts = Post::latest()->where('reciever_type','!=','user')->get();
      

        $posts = Post::latest()->where('user_id','=',$id)->whereNull('reciever_type')->get();

        $postsUser = Post::latest()->where('reciever_type','!=','event')->get();

        //  dd($postsUser);
        $posts = $posts->merge($postsUser);


        $posts2 = auth()->user()->posts;
        //dd($posts2);

        return view('posts.show',compact('posts'));
    }

    public function showRecieved($id)
    {
       // dd(auth()->user());

        $posts = Post::latest()->where('reciever_id','=',$id)->where('reciever_type','=','user')->get();

        $posts2 = auth()->user()->posts;
        //  dd($posts2);

        return view('posts.showRecieved',compact('posts'));
    }


    public function destroy($id)
    {
        //
        Post::destroy($id);

        return back();
    }

    public function confirm($id)
    {

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
}
