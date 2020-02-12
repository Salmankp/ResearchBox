<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\ResearchPaper;
use App\Researcher;
use App\Searcher;
use DB;
use Auth;
use App\Notifications\FollowResearcher;
use App\Notifications\UnfollowResearcher;

class FollowerController extends Controller
{
  public function follow_researcher($id, $searcher_id ){

    // $id => researcher_id

    $follower = new Follower;

    $follower->researcher_id = $id;
    $follower->searcher_id = $searcher_id;
    // follower name
    $follower_name = Searcher::find($searcher_id)->name;

    $followed_researchername = Researcher::find($id)->name;
    $followed_researcher = Researcher::find($id);
    $follower->save();

       // notify followed researcher
      $followed_researcher->notify(new FollowResearcher($follower_name));

    return redirect('searcher-profile')->with('followed', $followed_researchername);


  }

    public function unfollow_researcher($id, $searcher_id ){

      // $id => researcher_id

      // follower name
      $follower_name = Searcher::find($searcher_id)->name;

        $unfollower = new Follower;
        $unfollower= Follower::where('researcher_id', $id)
                             ->where('searcher_id', $searcher_id)
                             ->delete();

        $unfollowed_researcher = Researcher::find($id);

        $unfollowed_researchername = Researcher::find($id)->name;

        // notify unfollowed researcher
       $unfollowed_researcher->notify(new UnfollowResearcher($follower_name));


        return redirect('searcher-profile')->with('unfollowed', $unfollowed_researchername);


    }

}
