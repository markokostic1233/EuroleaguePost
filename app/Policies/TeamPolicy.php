<?php

namespace App\Policies;

use App\User;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Team $team)
    {
        //
    }


    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Team $team)
    {
      //  dd('Updating');
        return $user->id == $team->user_id;

    }


    public function delete(User $user, Team $team)
    {
       // dd('Deleting');

        return $user->id == $team->user_id;

    }


    public function restore(User $user, Team $team)
    {
        //
    }


    public function forceDelete(User $user, Team $team)
    {
        //
    }
}
