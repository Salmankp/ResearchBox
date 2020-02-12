<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Advertisement;
use DB;
use Auth;
use App\Researcher;

class AdvertisementController extends Controller
{

  public function index(){

    $id = Auth::guard('researcher')->user()->id;

    $advertisements = Researcher::find($id)->advertisement->SortByDesc('created_at');

      //return $researchpaper;
     return view('advertisementView',compact('advertisements', 'id'));


  }

  public function show($id){

  //get  single advertisement
  $advertisement = Advertisement::findorfail($id);

  //return single advertisement
  return view('advertisementDetail')->with('advertisement', $advertisement);

}


  public function store(Request $request, $id){



    $Advertisement = new Advertisement;
    //$id => researcher id
    $Advertisement->researcher_id = $id;
    $Advertisement->researcher_name = request('researcher_name');
    $Advertisement->email = request('email');
    $Advertisement->phone = request('phone');
    $Advertisement->designation = request('designation');
    $Advertisement->advertisement_name = request('advertisement_name');
    $Advertisement->type = request('type');
    $Advertisement->description = request('description');

    if($file = $request->file('advertisement_img')){

    $name = $file->getClientOriginalName();

    $path = $request->file('advertisement_img')->storeAs('Advertisements', $name);

    $Advertisement->advertisement_img = $name;

    }

    // return $request;

    $Advertisement->save();
    return redirect('researcher-profile');


  }

  public function edit($id) {

  $advertisement = Advertisement::findorfail($id);
    return view ('edit_advertisement')->with('advertisement', $advertisement);


  }

  public function update(Request $request, $id){

    $Advertisement = Advertisement::find($id);
    $Advertisement->researcher_name = request('researcher_name');
    $Advertisement->email = request('email');
    $Advertisement->phone = request('phone');
    $Advertisement->designation = request('designation');
    $Advertisement->advertisement_name = request('advertisement_name');
    $Advertisement->type = request('type');
    $Advertisement->description = request('description');

    if($file = $request->file('advertisement_img')){

    $name = $file->getClientOriginalName();

    $path = $request->file('advertisement_img')->storeAs('Advertisements', $name);

    $Advertisement->advertisement_img = $name;

    }

    // return $request;

    $Advertisement->save();
    return redirect('researcher-profile');


  }

  public function destroy($id){

    $Advertisement = Advertisement::find($id);

    if($Advertisement->delete()){

        return redirect('researcher-profile');

    }


  }

  public function search(Request $request, $id){

    //$id => researcher_id

    $name = $request->get('advertisement_name');

    $advertisements = Advertisement::query()
    ->where('advertisement_name', 'like' , '%' . $name. '%')
    ->where('researcher_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();

    return view('advertisementView',compact('advertisements' , 'id'));

  }



}
