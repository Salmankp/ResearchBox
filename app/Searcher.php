<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Searcher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function researcher()
   {
       return $this->belongsToMany('App\Researcher');
   }

   public function assistance()
   {
   return $this->belongsToMany('App\Assistance');
   }

   public function survey()
   {
   return $this->belongsToMany('App\Survey');
   }

   public function follower()
   {
   return $this->hasMany('App\Follower');
   }

   public function performed_assistance()
   {
   return $this->belongsTo('App\PerformedAssistance');
   }

}
