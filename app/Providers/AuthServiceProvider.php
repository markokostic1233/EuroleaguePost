<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Team' => 'App\Policies\TeamPolicy',

    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home.secret' , function($user){

            return $user->is_admin;

        });


        // Gate::define('update-post', function($user, $team){

        //   return $user->id == $team->user_id;

        // });

       // Gate::define('teams.update', 'App\Policies\TeamPolicy@update');
   //   Gate::define('teams.delete', 'App\Policies\TeamPolicy@delete');

        //teams.delete teams.update teams.create
       // Gate::resource('teams', 'App\Policies\TeamPolicy');

        // Gate::define('delete-post', function($user, $team){

        //     return $user->id == $team->user_id;

        //   });

        Gate::before(function ($user, $ability){

           if($user->is_admin && in_array($ability,['update', 'delete'])){

               return true;
           }

         });




        //  Gate::after(function ($user, $ability, $result){

        //     if($user->is_admin){

        //         return true;
        //     }

        //   });
    }
}
