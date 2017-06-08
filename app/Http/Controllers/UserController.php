<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       // dd($user);


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

        //dd($latitude);
        return view('secondpage.profil',compact('user','latitude','longitude'));

    }

    public function show2($id)
    {

        // dd($user);


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

        //dd($latitude);
        return view('user.show',compact('user','latitude','longitude'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //

        $user = User::whereId($id)->first();


        return view('user.edit',compact('user'));
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
        $data = $request->all();
        $user = User::whereId($id)->first();

        if (Input::file('picture')) {


            $lala = Input::file('picture');
            $extension = Input::file('picture')->getClientOriginalExtension();
            $destinationPath='img/profile/';
            $fileName = rand(11111,99999).'.'.$extension;  // renaming image
            Input::file('picture')->move($destinationPath, $fileName);

            $user->update([
                'profilePic'=>$fileName,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'country' => $data['country'],
                'zipcode' => $data['zipcode'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'city' => $data['city'],
                'about_me' =>$data['aboutMe'],
            ]);
            $user->profilePic=$fileName;
        }

        $user->update([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'zipcode' => $data['zipcode'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'about_me' =>$data['aboutMe'],
        ]);
        $user->save();
        return redirect('/second');
    }

}
