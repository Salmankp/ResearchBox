<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use DB;
use App\Http\Resources\Survey as SurveyResource;
use Auth;
use App\Researcher;
use Storage;
use Response;
use PDF;

class SurveyController extends Controller
{

  public function index(){

    // //get  all surveys
    // $Survey = Survey::paginate('15');
    //
    // //return Collection
    // return SurveyResource::collection($Survey);

    $id = Auth::guard('researcher')->user()->id;

    $surveys = Researcher::find($id)->survey;

      //return $surveys;
     return view('surveyView',compact('surveys'));


  }


  public function show($id){

  //get  single survey
  $Survey = Survey::findorfail($id);


  //return single Survey
  return view('surveyDetail')->with('survey', $Survey);


//  return new SurveyResource($Survey);

}


  public function store(Request $request, $id){



    $Survey = new Survey;
    //$id => researcher id
    $Survey->researcher_id = $id;
    $Survey->researcher_name = request('researcher_name');
    $Survey->email = request('email');
    $Survey->phone = request('phone');
    $Survey->designation = request('designation');
    $Survey->survey_name = request('survey_name');
    $Survey->type = request('type');

    if($file = $request->file('file')){

    $name = $file->getClientOriginalName();

    $path = $request->file('file')->storeAs('public/Surveys', $name);

    $Survey->file = $name;

    }

    // return $request;

    $Survey->save();
    return redirect('researcher-profile');
  //  return new SurveyResource($Survey);


  }

  public function edit($id) {

  $Survey = Survey::findorfail($id);
    return view ('edit_conductSurvey')->with('survey', $Survey);


  }

  public function update(Request $request, $id){

    $Survey = Survey::find($id);
   $Survey->researcher_name = request('researcher_name');
    $Survey->email = request('email');
    $Survey->phone = request('phone');
    $Survey->designation = request('designation');
    $Survey->survey_name = request('survey_name');
    // $Survey->service = request('service');
    // $Survey->journal_name = request('journal_name');
    // $Survey->journal_publisher = request('journal_publisher');
    // $Survey->journal_publish_date = request('journal_publish_date');
    //  $Survey->conference_name = request('conference_name');
    //  $Survey->Conference_date = request('Conference_date');
    //  $Survey->conference_location = request('conference_location');
    //  $Survey->conference_supervisor = request('conference_supervisor');
    //  $Survey->institution = request('institution');
    // $Survey->type = request('type');
    //  $Survey->institute = request('institute');
    // $Survey->payment_type = request('payment_type');
    // $Survey->price = request('price');

    if($file = $request->file('file')){

    $name = $file->getClientOriginalName();

    // getting extension of upload file.
     //$extension = $file->getClientOriginalExtension();

    $path = $request->file('file')->storeAs('Surveys', $name);

    $Survey->file = request('file');

    }

    $Survey->save();

    return redirect('researcher-profile');

  }

  public function destroy($id){

    $Survey = Survey::find($id);

    if($Survey->delete()){

        return redirect('researcher-profile');

    //  return new SurveyResource($Survey);
    }


  }





}
