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
use App\Admin;
use App\Notifications\ArticleApproved;

class AdminController extends Controller
{
  public function showTable(Request $request)
    {

        $researchpapers = Researchpaper::get()->all();

          //return $researchpaper;
         return view('adminProfile',compact('researchpapers'));
     }


     public function researcher_search(Request $request){


       $name = $request->get('researcher_name');

       $showresearchers = Researcher::query()->where('name', 'like' , '%' . $name. '%')->get();

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;


        return view('allResearchers',compact('showresearchers', 'admin_id'));


     }

     public function show_researcher_articles(Request $request, $id){

       // $id => researcher id

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;

       $researcher = new Researcher;

       $researchpapers = $researcher->find($id)->researchpaper->SortByDesc('created_at');


         //return $researchpapers;
        return view('allArticleView',compact('researchpapers', 'id', 'admin_id'));

     }

     public function search_researcher_article_detail(Request $request, $id){

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;

       $researchpaper = ResearchPaper::findorfail($id);

       return view('searcherArticleDetail')
       ->with(compact('admin_id'))
       ->with('researchpaper', $researchpaper);

     }

     public function all_researchers(){

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;
        // dd($admin_id);
       $showresearchers = Researcher::get()->all();


        return view('allResearchers',compact('showresearchers', 'admin_id'));

     }


     public function all_researchpapers(){

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;

       $researchpapers = ResearchPaper::orderBy('created_at', 'desc')->get()->all();
       //dd($all_researchpapers);

       //return $researchpapers;
      return view('allArticleView',compact('researchpapers', 'admin_id'));

     }

     public function all_journals(){

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;

       $researchpapers = ResearchPaper::query()
       ->Where('service', 'jr')
       ->orderBy('created_at', 'desc')
       ->get()
       ->all();

       //return $researchpapers;
      return view('allArticleView',compact('researchpapers', 'admin_id'));

     }

     public function all_conferences(){

       // for showing admin navbar and side bar
        $admin_id = Auth::guard('admin')->user()->id;

       $researchpapers = ResearchPaper::query()
       ->Where('service', 'cr')
       ->orderBy('created_at', 'desc')
       ->get()
       ->all();

       //return $researchpapers;
      return view('allArticleView',compact('researchpapers', 'admin_id'));

     }

     public function show_pending_articles(){

       $researchpapers = ResearchPaper::get()->SortByDesc('id');

       return view('pendingArticles', compact('researchpapers'));
     }

     public function delete_notifications(){

         $admin_id = Auth::guard('admin')->user()->id;
         $admin = Admin::find($admin_id);

         $delete_notification = $admin->notifications()
         ->where('notifiable_type', 'App\Admin')
         ->where('notifiable_id',$admin_id)->delete();
         return redirect('admin-profile');

     }

     public function approve_article($id){

       $researchpaper = ResearchPaper::find($id);



        $researchpaper->status = '1';

        $researchpaper->save();

        // for notification
        // finding a researcher whose article is approved

        $researcher_id = ResearchPaper::find($id)->researcher_id;

        $researcher = Researcher::find($researcher_id);

        //  finding researchpaper name
        $researchpaper_name = ResearchPaper::find($id)->article_name;

        // notify researcher whose article is approved
       $researcher->notify(new ArticleApproved($researchpaper_name));

        return redirect('admin-profile');

     }

}
