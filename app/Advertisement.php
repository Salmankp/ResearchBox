<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
  public function researcher()
 {
     return $this->belongsTo('App\Researcher');
 }
}
