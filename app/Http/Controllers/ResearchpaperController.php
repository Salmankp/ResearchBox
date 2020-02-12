<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ResearchPaper;
use DB;
use App\Http\Resources\Researchpaper as ResearchpaperResource;
use Auth;
use App\Researcher;
use Response;
use Session;
use Illuminate\Support\Facades\Input;
use App\Notifications\AuthenticateArticle;
use App\Admin;


class ResearchpaperController extends Controller
{


  public function index(Request $request){

    //returning through api

    //get  all researchpapers
    // $ResearchPaper = ResearchPaper::paginate('15');
    //
    // //return Collection
    // return ResearchPaperResource::collection($ResearchPaper);



    //returning through database
    // getting id by guard named as researcher
      $id = Auth::guard('researcher')->user()->id;


      $researcher = new Researcher;

      $researchpapers = $researcher->find($id)->researchpaper->SortByDesc('created_at');
      // ->paginate(2);

        //return $researchpapers;
       return view('articleView',compact('researchpapers' , 'id'));


  }


  public function show($id){


  //get  single researchpaper
  $researchpaper = ResearchPaper::findorfail($id);

  // $researcher_id = $researchpaper->researcher_id;



  return view('articleDetail')->with('researchpaper', $researchpaper);


    // $researchpaper = ResearchPaper::findorfail($id);
    //   $filename = $researchpaper->file;
    //   $path = storage_path('app\researchpapers/' . $filename);
    //
    //   $file =  Response::make(file_get_contents($path), 200, [
    // 'Content-Type' => 'application/pdf',
    // 'Content-Disposition' => 'inline; filename="'.$filename.'"'
    // ]);
    //  return $file;



  //return single researchpaper in api format
  //return new ResearchPaperResource($ResearchPaper);

}

  public function store(Request $request, $id){

    // getting id of the researcher
    //$id = Auth::guard('researcher')->user()->id;

    $ResearchPaper = new ResearchPaper;

    //getting the $id of the researcher
    $ResearchPaper->researcher_id = $id;


    if (request('isbn') > 0 && !ResearchPaper::where('isbn', '=', Input::get('isbn'))->exists()){


    $ResearchPaper->researcher_name = request('researcher_name');
    $ResearchPaper->email = request('email');
    $ResearchPaper->phone = request('phone');
    $ResearchPaper->designation = request('designation');
    $ResearchPaper->article_name = request('article_name');
    $ResearchPaper->isbn = request('isbn');

    $ResearchPaper->article_title = request('article_title');

    $ResearchPaper->co_authors = request('co_authors');
    $ResearchPaper->co_author1 = request('co_author1');
    $ResearchPaper->co_author1_email = request('co_author1_email');
    $ResearchPaper->co_author1_designation = request('co_author1_designation');
    $ResearchPaper->co_author2 = request('co_author2');
    $ResearchPaper->co_author2_email = request('co_author2_email');
    $ResearchPaper->co_author2_designation = request('co_author2_designation');

    $ResearchPaper->service = request('service');
    $ResearchPaper->journal_name = request('journal_name');
    $ResearchPaper->journal_publisher = request('journal_publisher');
    $ResearchPaper->journal_publish_date = request('journal_publish_date');
    $ResearchPaper->conference_name = request('conference_name');
    $ResearchPaper->Conference_date = request('Conference_date');
    $ResearchPaper->conference_location = request('conference_location');
    $ResearchPaper->conference_supervisor = request('conference_supervisor');
    $ResearchPaper->institution = request('institution');
    //$ResearchPaper->institute = request('institute');
    $ResearchPaper->type = request('type');
    $ResearchPaper->payment_type = request('payment_type');
    $ResearchPaper->price = request('price');

    if($file = $request->file('file')){

    $name = $file->getClientOriginalName();

     //getting extension of upload file.
    // $extension = $file->getClientOriginalExtension();

    $path = $request->file('file')->storeAs('public/researchpapers', $name);
    // $path  =  Storage::disk('public')->put('researchpapers', $name);

    $ResearchPaper->file = $name;

    }

     // return $request;

     // for Notification
     // getting admin and resarcher
     $admin = Admin::get()->first();
     $researcher_name = Researcher::find($id)->name;

     // notify followed researcher
    $admin->notify(new AuthenticateArticle($researcher_name));


    $ResearchPaper->save();
    return redirect('researcher-profile')->with('uploaded', 'Article Uploaded');
  //  return new ResearchPaperResource($ResearchPaper);
}

  else {
    $isbn_error ='ISBN number could not be same or negative';
    //dd($error);
    return redirect()->back()->with('isbn_error', $isbn_error);

  }


}

  public function edit($id) {

  $ResearchPaper = ResearchPaper::findorfail($id);
    return view ('edit_uploadArticle')->with('researchpaper', $ResearchPaper);


  }

  public function update(Request $request, $id){

    $ResearchPaper = ResearchPaper::find($id);
    $ResearchPaper->researcher_name = request('researcher_name');
    $ResearchPaper->email = request('email');
    $ResearchPaper->phone = request('phone');
    $ResearchPaper->designation = request('designation');
    $ResearchPaper->article_name = request('article_name');
    $ResearchPaper->service = request('service');
    $ResearchPaper->journal_name = request('journal_name');
    $ResearchPaper->journal_publisher = request('journal_publisher');
    $ResearchPaper->journal_publish_date = request('journal_publish_date');
     // $ResearchPaper->conference_name = request('conference_name');
     // $ResearchPaper->Conference_date = request('Conference_date');
     // $ResearchPaper->conference_location = request('conference_location');
     // $ResearchPaper->conference_supervisor = request('conference_supervisor');
     // $ResearchPaper->institution = request('institution');
    $ResearchPaper->type = request('type');
     // $ResearchPaper->institute = request('institute');
    $ResearchPaper->payment_type = request('payment_type');
    $ResearchPaper->price = request('price');

    if($file = $request->file('file')){

    $name = $file->getClientOriginalName();

    // getting extension of upload file.
     //$extension = $file->getClientOriginalExtension();

    $path = $request->file('file')->storeAs('researchpapers', $name);

    $ResearchPaper->file = request('file');

    }

    $ResearchPaper->save();

    return redirect('researcher-profile');

  }

  public function destroy($id){

    $ResearchPaper = ResearchPaper::find($id);

    if($ResearchPaper->delete()){

      return redirect('researcher-profile');

      //return new ResearchPaperResource($ResearchPaper);
    }


  }

  public function search(Request $request, $id){

    // $id => researcher id

    $article_name = $request->get('article_name');
    $type = $request->get('type');


    $researchpapers = ResearchPaper::query()
     ->Where('article_name', 'like',  '%'.$article_name.'%')
     ->orWhere('type', $type)
     ->where('researcher_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();

    //
    // // for showing searcherNavbar and searcherSidebar
    // $searcher_id = Auth::guard('searcher')->user()->id;

     // dd($showarticles);
     //return view('articleView', ['showarticles' => $showarticles]);
    //  return view ('articleView')->with('showarticles', $showarticles);
     return view('articleView',compact('researchpapers' , 'id'));


  }

  public function download_pdf($id){


    $download_file = ResearchPaper::find($id)->file;
    $file_path =  public_path(). "/storage/researchpapers/" .$download_file;

    // $headers = array(
    //          'Content-Type: application/pdf',
    //        );

    return response()->download($file_path, $download_file);

  }

  // public function all_articles_search(Request $request){
  //
  //
  //   $article_name = $request->get('article_name');
  //   $type = $request->get('type');
  //
  //
  //   $researchpapers = ResearchPaper::query()
  //    ->Where('article_name', 'like',  '%'.$article_name.'%')
  //    ->orWhere('type', $type)
  //   ->orderBy('created_at', 'desc')
  //   ->get();
  // return view('allResearchers', compact ('researchpapers'));
  //
  // }


}
