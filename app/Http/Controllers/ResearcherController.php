<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Researcher;
use App\Researchpaper;
use View;
use Image;
use App\Follower;
use DB;
use App\PerformedSurvey;
use App\Survey;
use App\Assistance;
use App\PerformedAssistance;
use App\SellArticle;
use App\Notifications;




class ResearcherController extends Controller
{

public function showuploadArticle(Request $request){

  $id = Auth::guard('researcher')->user()->id;
  $researcher = Researcher::findorfail($id);
  return view('uploadArticle',compact('researcher'));

}

public function showconductSurvey(Request $request){

  $id = Auth::guard('researcher')->user()->id;
  $researcher = Researcher::findorfail($id);
  return view('conductSurvey',compact('researcher'));


}

public function showAdvertisement(Request $request){

  $id = Auth::guard('researcher')->user()->id;
  $researcher = Researcher::findorfail($id);
  return view('Advertisement',compact('researcher'));

}


  public function index(Request $request)
    {
      // getting id by guard named as researcher
        $id = Auth::guard('researcher')->user()->id;

        // getting the researchpapers of a specific researcher
        $researcher = Researcher::with('researchpaper')->find($id);

        return view('researcherProfileView',compact('researcher'));

     }

     public function showTable(Request $request)
       {
         // getting id by guard named as researcher
           $id = Auth::guard('researcher')->user()->id;

           $researcher_name = Auth::guard('researcher')->user()->name;


           $researchpapers = Researcher::find($id)->researchpaper;

            return view('researcherProfile',compact('researchpapers', 'researcher_name'));
        }

  // public function profile_image(Request $request)
  // {
  //      $researchers = Researcher::all();
  //     // return view('myHome', array('user'=> Auth::user()));
  //
  //     return View::make('myHome')
  //
  //      ->with(compact('researchers'));
  //
  // }

 public function updatepic(Request $request, $id)
  {

    $researcher = Researcher::findorfail($id);
    if($profile_pic = $request->file('profile_pic')){

    $name = $profile_pic->getClientOriginalName();
    //$extension = $file->getClientOriginalExtension();


    $path = $request->file('profile_pic')->storeAs('public/ProfilePictures', $name);  //storing in storage dierectory

    Image::make($profile_pic)->resize(300,300)->save(public_path('/profile-images/' . $name));  //stroing in public/profile-images folder

    $researcher->profile_pic = $name;// stroing in database

  $researcher->save();
  return redirect('/researcher-profile');

  }
}

  public function update_profile(Request $request, $id){

    $researcher = Researcher::findorfail($id);
    $researcher->position = request('position');
    $researcher->address = request('address');
    $researcher->phone = request('phone');
    $researcher->zip_code = request('zip_code');
    $researcher->organization = request('organization');
    $researcher->experience = request('experience');
    $researcher->area = request('area');
    $researcher->major = request('major');
    $researcher->type = request('type');
    $researcher->description = request('description');

  $researcher->save();
  return redirect('/researcher-profile');

  }

  public function researcher_search(Request $request){


    $name = $request->get('researcher_name');

    $showresearchers = Researcher::query()->where('name', 'like' , '%' . $name. '%')->get();

    // for showing researcher navbar and side bar

       $researcher_id = Auth::guard('researcher')->user()->id;


     return view('allResearchers',compact('showresearchers', 'researcher_id'));


  }

  public function show_researcher_articles(Request $request, $id){

    // $id => researcher id

    $researcher = new Researcher;

    $researchpapers = $researcher->find($id)->researchpaper->SortByDesc('created_at');


      //return $researchpapers;
     return view('allArticleView',compact('researchpapers', 'id'));

  }

  public function search_researcher_article_detail(Request $request, $id){

    $researchpaper = ResearchPaper::findorfail($id);

    return view('searcherArticleDetail')->with('researchpaper', $researchpaper);

  }

  public function all_researchers(){


      $showresearchers = Researcher::get()->all();

      // for showing researcher navbar and side bar
       $researcher_id = Auth::guard('researcher')->user()->id;
       //dd($showresearchers);


     return view('allResearchers',compact('showresearchers', 'researcher_id'));

  }


  public function all_researchpapers(){

    $researchpapers = ResearchPaper::orderBy('created_at', 'desc')->get()->all();
    //dd($all_researchpapers);

    //return $researchpapers;
   return view('allArticleView',compact('researchpapers'));

  }

  public function all_journals(){

    $researchpapers = ResearchPaper::query()
    ->Where('service', 'jr')
    ->orderBy('created_at', 'desc')
    ->get()
    ->all();

    //return $researchpapers;
   return view('allArticleView',compact('researchpapers'));

  }

  public function all_conferences(){

    $researchpapers = ResearchPaper::query()
    ->Where('service', 'cr')
    ->orderBy('created_at', 'desc')
    ->get()
    ->all();

    //return $researchpapers;
   return view('allArticleView',compact('researchpapers'));

  }

  public function followers(){

    // taking id of researcher who has followers
    $researcher_id = Auth::guard('researcher')->user()->id;

    //getting the $searcher_id having relation with $researcher_id in follower table
    $searcher_id = Follower::with('searcher')
    ->where('researcher_id', $researcher_id)
    ->get()
    ->map->only(['searcher_id']);

     // showing searchers having realtion with the $researcher_id
     $showsearchers = DB::table('followers')
     ->join('searchers', 'followers.searcher_id', '=' ,'searchers.id')
     ->where("followers.researcher_id", $researcher_id)
     ->whereIn("followers.searcher_id", $searcher_id)
     ->select('searchers.*')
     ->orderBy('created_at', 'desc')
     ->get();

     return view('followersearchers',compact('showsearchers'));

  }

  public function performed_surveys(){



  // taking id of researcher who had conduct surveys
    $researcher_id = Auth::guard('researcher')->user()->id;

    $performed_surveys = PerformedSurvey::query()->where('researcher_id' ,$researcher_id )->get();

    return view('PerformedSurvey', compact('performed_surveys'));
  }


  public function search_survey_performed(Request $request){

    $survey_name = $request->get('survey_name');

    $performed_surveys = PerformedSurvey::query()->where('survey_name', 'like' , '%' . $survey_name. '%')->get();

     return view('PerformedSurvey',compact('performed_surveys'));

  }

  public function online_tasks(){

    // researcher who will perform task
    $researcher_id = Auth::guard('researcher')->user()->id;
    $researcher = Researcher::findorfail($researcher_id);

    $all_assistances = Assistance::query()->where('researcher_id', $researcher_id)->get()->SortByDesc('created_at');

    return view('allAssistanceView',compact('researcher', 'all_assistances'));

  }

  public function perform_task(Request $request, $assistance_id){

    // $assistance_id => assistance_id

    $assistance = Assistance::findorfail($assistance_id);

    // researcher name who is performing a task
    $researcher_id = Auth::guard('researcher')->user()->id;
    $researcher = Researcher::findorfail($researcher_id);

    return view('performAssistance',compact('researcher', 'assistance_id', 'assistance'));

  }

    public function performed_tasks(){

      // taking id of researcher who had performed tasks
        $researcher_id = Auth::guard('researcher')->user()->id;
        $researcher = Researcher::findorfail($researcher_id);


        // getting the assistance id who has relation with searcher and $researcher_id in assistance table
        $assistance_id = Assistance::query()
        ->where('researcher_id' ,$researcher_id )
        ->orderBy('created_at', 'desc')
        ->get()
        ->map->only(['id']);

          // getting the assistance so that relation could be found between searcher and researcher_id
          $performed_assistances = PerformedAssistance::query()->whereIn('assistance_id' ,$assistance_id )->orderBy('created_at', 'desc')->get();

          return view('allAssistanceView', compact('researcher', 'performed_assistances'));

    }

    public function sold_articles(){

      $researcher_id = Auth::guard('researcher')->user()->id;
      // getting the $researchpaper_id which are sold by the $researcher_id
      $researchpaper_id = SellArticle::query()
       ->where('researcher_id', $researcher_id)
       ->get()
       ->map->only(['researchpaper_id']);

       //getting the ResearchPaper
       $researchpapers = ResearchPaper::findorfail($researchpaper_id);

       return view('buyedArticle', compact('researchpapers', 'researcher_id'));


    }

    public function delete_notifications(){

        $researcher_id = Auth::guard('researcher')->user()->id;
        $researcher = Researcher::find($researcher_id);

        $delete_notification = $researcher->notifications()
        ->where('notifiable_type', 'App\Researcher')
        ->where('notifiable_id',$researcher_id)->delete();
        return redirect('researcher-profile');

    }

  public function researcher_Logout(){
    auth()->logout();

    session()->flash('message', 'Goodbye');

    return redirect('/researcher-showlogin');
  }



}
