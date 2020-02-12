<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Researcher;
use App\Searcher;
use App\ResearchPaper;
use App\SellArticle;
use App\Notifications\BuyedArticle;


class SellArticleController extends Controller
{
  public function buy_article($id, $searcher_id){

  // $id => $researchpaper_id

  // getting a researcher
  $researcher_id = Researchpaper::find($id)->researcher_id;

  $sell_article = new SellArticle;

  $sell_article->researchpaper_id = $id;
  $sell_article->researcher_id = $researcher_id;
  $sell_article->searcher_id = $searcher_id;
  $sell_article->article_name = Input::get('article_name');
  $sell_article->researcher_name = Input::get('researcher_name');
  $sell_article->researcher_email = Input::get('researcher_email');
  $sell_article->searcher_name = Input::get('searcher_name');
  $sell_article->searcher_email = Input::get('searcher_email');
  $sell_article->searcher_account_number = Input::get('searcher_account_number');
  $sell_article->article_price = Input::get('article_price');

  $sell_article->save();


  $researcher = Researcher::find($researcher_id);

  // for notification
  // getting searcher name
  $follower_name = Searcher::findorfail($searcher_id)->name;
  // notify researcher whose researchpaper is buyed
  $researcher->notify(new BuyedArticle($follower_name));

  return redirect('searcher-profile');

  }

}
