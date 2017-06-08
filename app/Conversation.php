<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

    public function users(){

        return $this->belongsToMany(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }



    public function addMessage($body,$id,$userid){


       $message = new Message();

       $message->content = $body;
       $message->user_id=$userid;
       $message->conversation_id= $id;
       $message->is_seen=false;
       $message->save();


        return $message;


    }
}
