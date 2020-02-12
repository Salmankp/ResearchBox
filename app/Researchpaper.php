<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researchpaper extends Model
{



  protected $fillable = [
      'researcher_name', 'email', 'phone','designation',
      'article_name','isbn','article_title','service','journal_name',
      'journal_publisher','journal_publish_date','conference_name_date','conference_date',
      'conference_location','conference_supervisor','institution','institute','payment_type','price',
  ];


  public function researcher()
 {
     return $this->belongsTo(Researcher::class);
 }

}
