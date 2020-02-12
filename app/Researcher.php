<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $table = 'researchers';
    protected $fillable = [
        'name','address','dob','phone', 'zip_code','email','password','organization',
         'experience', 'category','position', 'area','major','type','description','profile_pic','verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function searcher()
    {
        return $this->hasMany('App\Searcher');
    }

      public function researchpaper()
    {
      return $this->hasMany('App\Researchpaper');
    }

    public function sellarticle()
    {
    return $this->belongsTo('App\Sellarticle');
    }

    public function assistance()
    {
    return $this->belongsToMany('App\Assistance');
    }

    public function survey()
    {
    return $this->hasMany('App\Survey');
    }

    public function follower()
    {
    return $this->hasMany('App\Follower');
    }

    public function advertisement()
{
    return $this->hasMany('App\Advertisement');
}
    public function performed_survey()
    {
    return $this->belongsTo('App\PerformedSurvey');
    }

}
