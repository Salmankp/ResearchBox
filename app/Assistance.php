<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
  public function researcher()
 {
     return $this->belongsToMany('App\Researcher');
 }

 public function searcher()
 {
    return $this->belongsToMany('App\Searcher');
 }

 public function performed_assistance()
 {
    return $this->hasMany('App\PerformedAssistance');
 }

}
