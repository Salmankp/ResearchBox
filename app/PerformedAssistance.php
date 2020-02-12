<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformedAssistance extends Model
{
  public function assistance()
  {
  return $this->belongsTo('App\Assistance');
  }

  public function searcher()
  {
  return $this->hasMany('App\Searcher');
  }
  
}
