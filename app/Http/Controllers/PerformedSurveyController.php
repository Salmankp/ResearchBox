<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerformedSurvey;
use Illuminate\Support\Facades\Input;
use App\Notifications\SurveyPerformed;
use App\Researcher;

class PerformedSurveyController extends Controller
{
  public function survey_performed($id , $researcher_id){

    // $id => survey_id
    // $researcher_id => researcher_id

    $performed_survey = new PerformedSurvey;

    $performed_survey->survey_id = $id;
    $performed_survey->researcher_id = $researcher_id;
    $performed_survey->researcher_name = Input::get('researcher_name');
    $performed_survey->designation = Input::get('designation');
    $performed_survey->survey_name = Input::get('survey_name');
    $performed_survey->searcher_name = Input::get('searcher_name');
    $performed_survey->searcher_email = Input::get('searcher_email');
    $performed_survey->searcher_qualification = Input::get('searcher_qualification');
    $performed_survey->searcher_age = Input::get('searcher_age');
    $performed_survey->searcher_description = Input::get('searcher_description');

    if($file = Input::get('file')){

    $name = $file->getClientOriginalName();

     //getting extension of upload file.
    // $extension = $file->getClientOriginalExtension();

    $path = Input::get('file')->storeAs('public/PerformedSurveys', $name);

    $performed_survey->file = $name;

    }

    $performed_survey->save();

    // for notification
    //finding resarcher and $follower_name
    $researcher = Researcher::find($researcher_id);

    $follower_name = Input::get('searcher_name');

    // notify followed researcher
   $researcher->notify(new SurveyPerformed($follower_name));


    return redirect('searcher-profile')->with('performed', 'Survey Performed');


  }


}
