<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name', 'description','picture', 'address','zipcode','city','country',
    ];

    public function posts(){

        return $this->hasMany('App\Post','reciever_id');
    }

    //
}
