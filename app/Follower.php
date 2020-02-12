<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function researcher(){

       return $this->belongsTo('App\Researcher');

    }

    public function searcher(){

       return $this->belongsTo('App\Searcher');

    }
}
