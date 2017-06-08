<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //




    public function searchableAs()
    {
        return 'posts_index';
}

    protected $fillable = [
        'name', 'description', 'status','user_id','picture'
    ];

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function candidates()
    {

        return $this->belongsToMany('App\User','post_user','post_id','user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }


    public function event(){

        return $this->hasMany('App\Event','reciever_id');
    }


    public function reciever(){

        $user = $this->belongsTo('App\User','reciever_id');

        if($this->reciever_type=="user"){
            return $this->belongsTo('App\User','reciever_id');
        }else{
            return $this->belongsTo(Event::class);
        }



    }


    public function addComment($body,$id,$userid){


        $comment = new Comment();


        $comment->user_id=$userid;
        $comment->content=$body;
        $comment->post_id=$id;

        $comment->save();

        return $comment;
    }

    public static function provide($id){

        return Post::latest()->where('user_id', '!=', $id)->get();
    }
}
