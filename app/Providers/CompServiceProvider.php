<?php

namespace App\Providers;

use App\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard;

class CompServiceProvider extends ServiceProvider
{
    /**
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(Guard $auth) {

        view()->composer('layouts.app', function($view) use ($auth) {
            // get the current user
            $user = $auth->user();

            // do stuff with the current user
            // ...)
            // pass the data to the view
            $conversations = $user->conversations;
            $br=0;

            foreach ($conversations as $conversation){

                $messages = $conversation->messages;

                foreach ($messages as $message){
                    if($message->is_seen == false ){
                        if($message->user->id == $user->id){
                            continue;
                        }
                        $br = $br +1;
                        break;
                    }
                }
            }
          //  dd($conversation);
          //  $events = Event::orderBy('id', 'desc')->take(5)->get();
            $view->with('br', $br);
        });
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
