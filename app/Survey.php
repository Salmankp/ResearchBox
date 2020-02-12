<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
  public function researcher()
 {
     return $this->belongsTo('App\Researcher');
 }

 public function searcher()
 {
    return $this->belongsToMany('App\Searcher');
 }

 public function performed_survey()
 {
 return $this->hasMany('App\PerformedSurvey');
 }

}
