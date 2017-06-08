<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function data()
    {
        // TODO: Implement data() method.

        return $this->name;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','country','isAdmin','address','city','phone','rating','zipcode','about_me'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function trophies(){

        return $this->belongsToMany(Trophy::class);
    }

    public function conversations(){

        return $this->belongsToMany(Conversation::class);
    }

    public function posts()

    {
        return $this->hasMany(Post::class);
    }

}
