<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Assistance;
use App\Notifications\PerformAssistance;
use App\Researcher;
use App\Searcher;

class ConductAssistanceController extends Controller
{
    public function store(Request $request, $searcher_id){

      $assistance = new Assistance;

      $assistance->searcher_id = $searcher_id;
      $assistance->researcher_id = request('researcher_id');
      $assistance->searcher_name = request('searcher_name');
      $assistance->searcher_email = request('searcher_email');
      $assistance->searcher_phone = request('searcher_phone');
      $assistance->searcher_qualification = request('searcher_qualification');
      $assistance->assistance_name = request('assistance_name');
      $assistance->assistance_description = request('assistance_description');

      if($file = $request->file('file')){

      $name = $file->getClientOriginalName();

       //getting extension of upload file.
      // $extension = $file->getClientOriginalExtension();

      $path = $request->file('file')->storeAs('public/ConductAssistances', $name);

      $assistance->file = $name;

      }

      $assistance->save();

      $researcher_id = request('researcher_id');

      // getting researcher who will perform task
      $followed_researcher = Researcher::find($researcher_id);

      // searcher who wants assistance
      $follower_name = Searcher::find($searcher_id)->name;

      // notify followed researcher
     $followed_researcher->notify(new PerformAssistance($follower_name));

      return redirect('searcher-profile')->with('assistance', 'Assistance Conducted');

    }

}
