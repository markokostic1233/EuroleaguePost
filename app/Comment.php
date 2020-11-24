<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   // protected $fillable = ['team_id', 'content'];

    public function teams(){

        return $this->belongsTo('App\Team');
    }

 public static function boot(){

    parent::boot();

   // static::addGlobalScope(new LatestScope);

    }

    public function scopeLatest(Builder $query){

        return $query->orderBy(static::CREATED_AT, 'desc');

     }






}
