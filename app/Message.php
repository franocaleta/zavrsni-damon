<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
         'is_seen', 'user_id','conversation_id','content'
    ];

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function data()
    {

    }
}
