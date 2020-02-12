<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Researchpaper;

class IndexController extends Controller
{
    public function show_index(){

      $researchpapers = ResearchPaper::all()->SortByDesc('created_at')->take(3);

      return view('myindex',compact('researchpapers'));

    }
}
