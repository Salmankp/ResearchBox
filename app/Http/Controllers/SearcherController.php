<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Searcher;
use View;
use Image;
use App\Researcher;
use App\Researchpaper;
use App\Follower;
use App\Survey;
use App\Advertisement;
use DB;
use App\Assistance;
use App\PerformedAssistance;
use App\SellArticle;
use PDF;






class SearcherController extends Controller
{

    public function index(Request $request)
      {
        // getting id by guard named as searcher
          $id = Auth::guard('searcher')->user()->id;

          // getting data of searcher which is currently logged in
         $searchers = Searcher::where('id',$id)->get();

         return view('searcherProfileView',compact('searchers'));

       }

       public function showResearchersArticle(Request $request)
         {
           // // getting id by guard named as searcher
           // $id = Auth::guard('searcher')->user()->id;
           //
           //   //geeting the researcher who has a relation with searcher(id)
           //  $researcher = Researcher::with('searcher')->find($id);
           //
           //  // getting the researchpapers of the researcher who has a relation with searcher
           //  $researchpapers = Researcher::find($researcher->id)->researchpaper;

           $searcher_id = Auth::guard('searcher')->user()->id;

          $searcher_name = Auth::guard('searcher')->user()->name;

            //finding researcher_id having relation with searcher_id in follower table
           $researcher_id = Follower::with('researcher')->where('searcher_id', $searcher_id)->get()->map->only(['researcher_id']);

           // showing articles
            $researchpapers = DB::table('followers')
            ->join('researchpapers', 'followers.researcher_id', '=' ,'researchpapers.researcher_id')
            ->whereIn("followers.researcher_id", $researcher_id)
            ->where("followers.searcher_id", $searcher_id)
            ->select('researchpapers.*')
            ->orderBy('created_at', 'desc')
            ->get();

            // showing surveys
            $surveys = DB::table('followers')
            ->join('surveys', 'followers.researcher_id', '=' ,'surveys.researcher_id')
            ->whereIn("followers.researcher_id", $researcher_id)
            ->where("followers.searcher_id", $searcher_id)
            ->select('surveys.*')
            ->orderBy('created_at', 'desc')
            ->get();

            //showing advertisement
            $advertisements = DB::table('followers')
            ->join('advertisements', 'followers.researcher_id', '=' ,'advertisements.researcher_id')
            ->whereIn("followers.researcher_id", $researcher_id)
            ->where("followers.searcher_id", $searcher_id)
            ->select('advertisements.*')
            ->orderBy('created_at', 'desc')
            ->get();

            // articles which are buyed by the searcher

            // // getting the $researchpaper_id which are buyed by the $searcher_id
            // $researchpaper_id = SellArticle::query()
            //  ->where('searcher_id', $searcher_id)
            //  ->get()
            //  ->map->only(['researchpaper_id']);
            //
            //  //getting the ResearchPaper
            //  $buyed = ResearchPaper::findorfail($researchpaper_id);

            //merging two collections
            //$results = $researchpapers->merge($surveys);


             //return $researchpaper, $survey and $advertisements;
              return view('searcherProfile')
              ->with('researchpapers', $researchpapers)
              ->with('surveys', $surveys)
              ->with('advertisements', $advertisements)
              ->with('searcher_name', $searcher_name);
              // ->with('buyed', $buyed);
              //   ->with('results',$results);
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

      $searcher = Searcher::findorfail($id);
      if($profile_pic = $request->file('profile_pic')){

      $name = $profile_pic->getClientOriginalName();
      //$extension = $file->getClientOriginalExtension();


      $path = $request->file('profile_pic')->storeAs('public/ProfilePictures', $name);  //storing in storage dierectory

      Image::make($profile_pic)->resize(300,300)->save(public_path('/profile-images/' . $name));  //stroing in public/profile-images folder

      $searcher->profile_pic = $name;// stroing in database

    $searcher->save();
    return redirect('/searcher-profile');


    }
  }

  public function update_profile(Request $request, $id){

    $searcher = Searcher::findorfail($id);

    $searcher->name = request('name');

  $searcher->save();
  return redirect('/searcher-profile');

  }

    public function show_researcher_articles(Request $request, $id){

      // $id => researcher id

      $researcher = new Researcher;

      $researchpapers = $researcher->find($id)->researchpaper->SortByDesc('created_at');

      // for showing searcherNavbar and searcherSidebar
      $searcher_id = Auth::guard('searcher')->user()->id;

        //return $researchpapers;
       return view('allArticleView',compact('researchpapers', 'id', 'searcher_id'));

    }

    public function search_researcher_article_detail(Request $request, $id){

      $researchpaper = ResearchPaper::findorfail($id);

      // for showing searcherNavbar and searcherSidebar
      $searcher_id = Auth::guard('searcher')->user()->id;

      return view('searcherArticleDetail')->with('researchpaper', $researchpaper)
                                          ->with('searcher_id', $searcher_id);

    }

    // for searching researchers from searcherNavbar
    public function searcher_search_researchers(Request $request){

      $name = $request->get('researcher_name');

      $showresearchers = Researcher::query()->where('name', 'like' , '%' . $name. '%')->get();


      // taking id of searcher who is following a reseacrhers
      $searcher_id = Auth::guard('searcher')->user()->id;


       return view('allResearchers',compact('showresearchers', 'searcher_id'));

    }

    public function survey_details($id){

    //get  single survey
    $Survey = Survey::findorfail($id);


    //return single Survey
    return view('searcherSurveyDetail')->with('survey', $Survey);


  //  return new SurveyResource($Survey);

  }

  public function advertisement_details($id){

    //get  single advertisement
    $advertisement = Advertisement::findorfail($id);


    //return single advertisement
    return view('searcherAdvertisementDetail')->with('advertisement', $advertisement);

  }

    public function followed_researchers(){

      // taking id of searcher who is following a reseacrhers
      $searcher_id = Auth::guard('searcher')->user()->id;

      //getting the $researcher_id having relation with $searcher_id in follower table
     $researcher_id = Follower::with('researcher')
      ->where('searcher_id', $searcher_id)
      ->get()
      ->map->only(['researcher_id']);

      // showing researchers having realtion with the $searcher_id
       $showresearchers = DB::table('followers')
       ->join('researchers', 'followers.researcher_id', '=' ,'researchers.id')
       ->whereIn("followers.researcher_id", $researcher_id)
       ->where("followers.searcher_id", $searcher_id)
       ->select('researchers.*')
       ->orderBy('created_at', 'desc')
       ->get();



      return view('allResearchers',compact('showresearchers', 'searcher_id'));


    }

    public function all_researchers(){


      $showresearchers = Researcher::get()->all();

      // taking id of searcher who is following a reseacrhers
      $searcher_id = Auth::guard('searcher')->user()->id;


      // getting the relation to show follow or unfollow button

      //  $relation = Follower::get();
      // ->where('searcher_id', $searcher_id)
      // ->get()
      // ->map->only(['researcher_id', 'searcher_id']);
      //
      //
      // dd($relation);




     //  //getting the $researcher_id having relation with $searcher_id in follower table
     // $researcher_id = Follower::with('researcher')
     //  ->where('searcher_id', $searcher_id)
     //  ->get()
     //  ->map->only(['researcher_id']);
     //   // dd($researcher_id);
     //
     //  // // showing researchers having realtion with the $searcher_id
     //  //  $showresearchers = DB::table('followers')
     //  //  ->join('researchers', 'followers.researcher_id', '=' ,'researchers.id')
     //  //  ->whereIn("followers.researcher_id", $researcher_id)
     //  //  ->where("followers.searcher_id", $searcher_id)
     //  //  ->select('researchers.*')
     //  //  ->orderBy('created_at', 'desc')
     //  //  ->get();
     //  //  dd($showresearchers);
     //
     //  $relations = Follower::query()->where('searcher_id', $searcher_id)->whereIn('researcher_id', $researcher_id)->get();
     //  // dd($relations);

       return view('allResearchers',compact('showresearchers', 'searcher_id'));
    }

    public function all_researchpapers(){

      $researchpapers = ResearchPaper::orderBy('created_at', 'desc')->get()->all();

      // for showing searcherNavbar and searcherSidebar
      $searcher_id = Auth::guard('searcher')->user()->id;

      //return $researchpapers;
     return view('allArticleView',compact('researchpapers', 'searcher_id'));

    }

    public function all_journals(){

      $researchpapers = ResearchPaper::query()
      ->Where('service', 'jr')
      ->orderBy('created_at', 'desc')
      ->get()
      ->all();

      // for showing searcherNavbar and searcherSidebar
      $searcher_id = Auth::guard('searcher')->user()->id;

      //return $researchpapers;
     return view('allArticleView',compact('researchpapers', 'searcher_id'));

    }

    public function all_conferences(){

      $researchpapers = ResearchPaper::query()
      ->Where('service', 'cr')
      ->orderBy('created_at', 'desc')
      ->get()
      ->all();

      // for showing searcherNavbar and searcherSidebar
      $searcher_id = Auth::guard('searcher')->user()->id;

      //return $researchpapers;
     return view('allArticleView',compact('researchpapers', 'searcher_id'));

    }

    public function perform_survey(Request $request, $id){

      // $id => survey_id

      $survey = Survey::findorfail($id);

      // searcher name who is performing a survey
      $searcher_id = Auth::guard('searcher')->user()->id;
      $searcher = Searcher::findorfail($searcher_id);

      return view('performSurvey',compact('searcher', 'id', 'survey'));

    }

    public function conduct_assistance(Request $request){

      $id = Auth::guard('searcher')->user()->id;
      $searcher = Searcher::findorfail($id);

      //finding researcher_id having relation with searcher_id in follower table
      $researcher_id = Follower::with('researcher')
       ->where('searcher_id', $id)
       ->get()
       ->map->only(['researcher_id']);

       // getting the researchers name having relaton witn the searcher

       $researchers = Researcher::findorfail($researcher_id);

      return view('conductAssistance',compact('searcher', 'researchers'));

    }

    public function all_assistances(){

      $searcher_id = Auth::guard('searcher')->user()->id;

      $all_assistances = Assistance::query()
      ->Where('searcher_id', $searcher_id)
      ->orderBy('created_at', 'desc')
      ->get();

      return view('allAssistanceView',compact('all_assistances'));
    }

    public function performed_assistances(){


    // taking id of searcher who had conduct assistance
      $searcher_id = Auth::guard('searcher')->user()->id;

      $performed_assistances = PerformedAssistance::query()->where('searcher_id' ,$searcher_id )->orderBy('created_at', 'desc')->get();

      return view('allAssistanceView', compact('performed_assistances'));
    }


    public function show_buy_article(Request $request, $id){

      // $id => $researchpaper_id

      $researchpaper = ResearchPaper::findorfail($id);


      $searcher_id = Auth::guard('searcher')->user()->id;
      $searcher = Searcher::findorfail($searcher_id);

       // getting the researcher name who is selling this article

       // $researcher = Researchpaper::with('researcher')->find($id);

       return View('buyArticle', compact('researchpaper', 'searcher', 'searcher_id'));

    }

    public function buyed_articles(){

      $searcher_id = Auth::guard('searcher')->user()->id;

      // getting the $researchpaper_id which are buyed by the $searcher_id
      $researchpaper_id = SellArticle::query()
       ->where('searcher_id', $searcher_id)
       ->get()
       ->map->only(['researchpaper_id']);

       //getting the ResearchPaper
       $researchpapers = ResearchPaper::findorfail($researchpaper_id);

      return view('buyedArticle', compact('researchpapers'));

    }

    public function delete_notifications(){

        $searcher_id = Auth::guard('searcher')->user()->id;
        $searcher = Searcher::find($searcher_id);

        $delete_notification = $searcher->notifications()
        ->where('notifiable_type', 'App\Searcher')
        ->where('notifiable_id',$searcher_id)->delete();
        return redirect('searcher-profile');

    }

    public function searcher_Logout(){
      auth()->logout();

      session()->flash('message', 'Goodbye');

      return redirect('/searcher-showlogin');
    }



}
