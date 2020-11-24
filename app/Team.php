<?php

namespace App;

use App\Scopes\DeletedAdminScope;
use App\User;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'user_id'];

    public function comments(){

         return $this->hasMany('App\Comment')->latest();
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public static function boot(){
        static::addGlobalScope(new DeletedAdminScope);

        parent::boot();


    }

    public function scopeLatest(Builder $query){

       return $query->orderBy(static::CREATED_AT, 'desc');

    }

    public function scopeMostCommented(Builder $query){

      return $query->withCount('comments')->orderBy('comments_count', 'desc');

    }

}
