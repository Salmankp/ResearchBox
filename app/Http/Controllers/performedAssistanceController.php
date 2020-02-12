<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerformedAssistance;
use Illuminate\Support\Facades\Input;
use App\Notifications\PerformedTask;
use App\Searcher;
use App\Resarcher;
class performedAssistanceController extends Controller
{
  public function assistance_performed($assistance_id , $searcher_id){

    // $assistance_id => assistance_id
    // $searcher_id => searcher_id

    $performed_assistance = new PerformedAssistance;

    $performed_assistance->assistance_id = $assistance_id;
    $performed_assistance->searcher_id = $searcher_id;
    $performed_assistance->searcher_name = Input::get('searcher_name');
    $performed_assistance->searcher_email = Input::get('searcher_email');
    $performed_assistance->searcher_qualification = Input::get('searcher_qualification');
    $performed_assistance->assistance_description = Input::get('assistance_description');
    $performed_assistance->assistance_name = Input::get('assistance_name');
    $performed_assistance->researcher_name = Input::get('researcher_name');
    $performed_assistance->researcher_qualification = Input::get('researcher_qualification');
    $performed_assistance->researcher_description = Input::get('researcher_description');

    if($file = Input::get('file')){

    $name = $file->getClientOriginalName();

     //getting extension of upload file.
    // $extension = $file->getClientOriginalExtension();

    $path = Input::get('file')->storeAs('public/PerformedAssistances', $name);

    $performed_assistance->file = $name;

    }

    $performed_assistance->save();

    //for notification
    // getting searcher whose task is completed
    $searcher = Searcher::find($searcher_id);

    $researcher_name = Input::get('researcher_name');

    // notify searcher
   $searcher->notify(new PerformedTask($researcher_name));

    return redirect('researcher-profile')->with('performed', 'Assistance Performed');


  }
}
