<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellArticle extends Model
{
  public function researcher()
 {
     return $this->hasMany('App\Researcher');
 }

   public function searcher()
  {
      return $this->hasMany('App\Searcher');
  }

  public function researchpaper()
 {
     return $this->hasMany('App\Researchpaper');
 }

}
