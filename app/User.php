<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams(){

         return $this->hasMany('App\Team');
    }

    public function scopeWithMostTeams(Builder $query){

        return $query->withCount('teams')->orderBy('teams_count', 'desc');

    }

      ///most active last month
    public function scopeWithMostTeamsLastMonth(Builder $query){

        return $query->withCount(['teams' => function(Builder $query){

         $query->whereBetween(static::CREATED_AT, [now()->subMonths(1), now()]);

        }])
        ->having('teams_count', '>=', 3)
        ->orderBy('teams_count', 'desc');

    }
 }

