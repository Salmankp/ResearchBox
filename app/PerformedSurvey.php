<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformedSurvey extends Model
{
  public function survey()
  {
  return $this->belongsTo('App\Survey');
  }

  public function researcher()
  {
  return $this->hasMany('App\Researcher');
  }
}
