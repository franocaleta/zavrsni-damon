<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    //

    public function users(){

        return $this->belongsToMany(User::class);
    }



}
