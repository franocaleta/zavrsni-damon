<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('layouts/master');
});


Route::get('/second/{id}','PostController@second');
Route::get('/second',function () {
    return redirect('second/1');
});
Route::get('posts-lists', ['as'=>'posts-lists','uses'=>'PostController@search']);

//Route::get('/searchTest', function () {
  //  $posts = new \Illuminate\Database\Eloquent\Collection();
   // return view('posts/searchdemo',compact('posts'));
//});

Route::get('/searchTest', 'PostController@search');




Route::post('/comment/{id}','CommentsController@store');
Route::get('/posts/{id}/demand','PostController@demand');
Route::get('/posts/{id}/pick/{userid}','PostController@pick');
Route::get('/posts/{id}/pickRandom','PostController@pickRandom');
Route::get('/posts/create','PostController@create');
Route::get('/posts/{id}','PostController@show');
Route::get('/posts/{id}/recieved','PostController@showRecieved');
Route::get('/posts/{id}/confirm','PostController@confirm');
Route::get('/post/index','PostController@index');
Route::post('/posts','PostController@store');
Route::post('/events','EventController@store');
Route::get('/events/index','EventController@index');
Route::post('/events/{id}/give','EventController@giveNew');
Route::post('/events/{id1}/giveExisting/{id2}','EventController@giveExisting');
Route::get('/admin','AdminController@index');
Route::get('/admin/set/{id}','AdminController@delivered');


Route::post('/editProfile/{id}','UserController@update');
Route::get('/profil/{id}','UserController@show');
Route::get('/profil2/{id}','UserController@show2');
Route::post('/conversation/{id}/sendMessage','ConversationController@sendMessage');
Route::get('/conversation/{id}','ConversationController@show');

Route::post('/conversation/store','ConversationController@store');


Route::post('/ajax/demand/{id}', function ($id) {
    // pass back some data

    // return a JSON response

    $useid = auth()->id();

    $user = \App\User::whereId($useid)->first();

    $post = \App\Post::whereId($id)->first();

    $post->candidates()->attach([$useid]);


    $post->save();


    return  Response::json($user);
});

Route::get('/ajax/comment/{id}', function ($id) {
    try{

        $post = \App\Post::whereId($id)->first();


        $userid = \Illuminate\Support\Facades\Auth::user();

        // dd($userid);
        //  $this->validate(request(),['content'=>'required|min:2']);

        $comment = $post->addComment(request('content'),$id,$userid->id);

        $user = $comment->user;

        $resp = array(
            "comment" => $comment,
            "user" =>$user
        );

        return Response::json($resp);


    }catch(\Exception $e){
        return  Response::json([
            'error' => 'Whoops, looks like something went wrong.',
            'debug'=> $e->getMessage()
        ]);
    }


});

Route::post('/ajax/post', function () {
    // pass back some data, along with the original data, just to prove it was received
    $data   = array('value' => 'some data', 'input' => Request::input());
    // return a JSON response
    return  Response::json($data);
});

Route::get('/ajax/view', function () {

    return view('posts.ajaxtest');
// really all this should be set up as a view, but I'm showing it here as
// inline html just to be easy to drop into your routes file and test
});
