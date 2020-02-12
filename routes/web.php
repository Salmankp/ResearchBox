<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// viewing researcher profile view
Route::get('/researcher-profileview', 'ResearcherController@index');

// viewing researcher profile
Route::get('/researcher-profile', 'ResearcherController@showTable');

// viewing article view
Route::get('/article-view', 'ResearchpaperController@index');

// viewing survey view
Route::get('/survey-view', 'SurveyController@index');




// viewing searcher profile
Route::get('/searcher-profile', 'SearcherController@showResearchersArticle');

// viewing searcher profile view
Route::get('/searcher-profileview', 'SearcherController@index');

// viewing searcher survey detail
Route::get('/searcher_survey_details/{id}', 'SearcherController@survey_details');




Route::get('/signup', function () {
    return view('signup');
});

Route::get('/admin-home', function () {
    return view('adminHome');
});


Route::get('/upload-form', function () {
    return view('uploadForm');
});

Route::get('/researcher-home', function () {
    return view('researcherHome');
});


// Route::get('/my-index', function(){
//   return view('myindex');
// });

Route::get('/my-index', 'IndexController@show_index');


// Route::get('/my-home', function(){
//   return view('myHome');
// })->name('my-home');
Route::get('/my-home', 'ResearcherController@profile_image')->name('my-home');


Route::get('/my-users', function(){
  return view('myUsers');
})->name('my-users');

Route::get('/my-home', 'ResearcherController@profile_image')->name('my-home');


Route::get('/upload-article', 'ResearcherController@showuploadArticle')->name('uploadArticle');

Route::get('/conduct-survey', 'ResearcherController@showconductSurvey')->name('conductSurvey');

Route::get('/create-advertisement', 'ResearcherController@showAdvertisement');

// Route::get('/edit_uploadArticle', function(){
//   return view('edit_uploadArticle');
// });


Route::get('/researcher-showregister', 'ResearcherAuth\RegisterController@showRegistrationForm')->name('researcher-showregister');
Route::get('/researcher-showlogin', 'ResearcherAuth\LoginController@showLoginForm')->name('researcher-showlogin');

Route::Post('/researcher-register', 'ResearcherAuth\RegisterController@register')->name('researcher-register');
Route::Post('/researcher-login', 'ResearcherAuth\LoginController@login')->name('researcher-login');



Route::get('/searcher-showregister', 'SearcherAuth\RegisterController@showRegistrationForm')->name('searcher-showregister');
Route::get('/searcher-showlogin', 'SearcherAuth\LoginController@showLoginForm')->name('searcher-showlogin');

Route::Post('/searcher-register', 'SearcherAuth\RegisterController@register')->name('searcher-register');
Route::Post('/searcher-login', 'SearcherAuth\LoginController@login')->name('searcher-login');


// getting the id of researchpaper for edit
Route::get('researchpaper/{id}/edit','ResearchpaperController@edit');

// getting the id of survey for edit
Route::get('survey/{id}/edit','SurveyController@edit');

// getting the id of advertisement for edit
Route::get('advertisement/{id}/edit','AdvertisementController@edit');

// checking profile image
Route::get('profile-image','ResearcherAuth\RegisterController@profile_image');
// updating the researcher image
Route::post('update-pic/{id}','ResearcherController@updatepic');

// updating the searcher image
Route::post('update-searcher-pic/{id}','SearcherController@updatepic');

//searching an article
Route::get('/article/search/{id}', 'ResearchpaperController@search');

//searching all researchers from researchers navbar
Route::get('/researchers/search', 'ResearcherController@researcher_search');

//searching advertisement
Route::get('/search-advertisement/{id}', 'AdvertisementController@search');


//viewing searching advertisement details
Route::get('/searcher-advertisement-details/{id}', 'SearcherController@advertisement_details');



// searching all articles of specific researcher from searcher profile
Route::get('/show-researcher-articles/{id}', 'SearcherController@show_researcher_articles');

// searching all articles of specific researcher from researcher profile
Route::get('/researcher-articles/{id}', 'ResearcherController@show_researcher_articles');

// getting the article detail view for researcher to see other researchers article details
Route::get('/researcher-view-other-researchpaper/{id}' , 'ResearcherController@search_researcher_article_detail');

// getting the article detail view for searcher
Route::get('/searcher-view-researchpaper/{id}' , 'SearcherController@search_researcher_article_detail');

// searching all researchers from searchers navbar
 Route::get('/searchers-search-researchers', 'SearcherController@searcher_search_researchers');



 // researcher logout
 Route::get('/researcher-logout', 'ResearcherController@researcher_logout')->name('researcher-logout');

 // searcher logout
 Route::get('/searcher-logout', 'SearcherController@searcher_logout')->name('searcher-logout');

 // follow a researcher
 Route::get('/follow/{id}/{searcher_id}', 'FollowerController@follow_researcher');

 // unfollow a researcher
 Route::get('/unfollow/{id}/{searcher_id}', 'FollowerController@unfollow_researcher');

 // showing follower articles for a searcher
 Route::get('/show_articles/{id}/{searcher_id}', 'FollowerController@showing_follower_articles');

 // showing all advertisement of a researcher
 Route::get('/advertisement-view','AdvertisementController@index');

 // verifyEmail
 Route::get('verifyEmailFirst','ResearcherAuth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

 Route::get('verify/{email}/{verifyToken}', 'ResearcherAuth\RegisterController@sendEmailDone')->name('sendEmailDone');


 //showing followed researchers
Route::get('followed-researchers','SearcherController@followed_researchers');

//showing followers
Route::get('followers','ResearcherController@followers');

// for researcher

 // showing all researchers
 Route::get('researcher-view-all-researchers','ResearcherController@all_researchers');

 //showing all researchpapers
Route::get('researcher-view-all-researchpapers','ResearcherController@all_researchpapers');

//showing all journals researchpapers
Route::get('researcher-view-all-journals','ResearcherController@all_journals');

//showing all conferences researchpapers
Route::get('researcher-view-all-conferences','ResearcherController@all_conferences');

// viewing performed surveys to researcher
Route::get('view-performed-surveys', 'ResearcherController@performed_surveys');

// search performed survey for researcher
Route::post('search-performed-surveys', 'ResearcherController@search_survey_performed');

// showing all to tasks
Route::get('online-tasks', 'ResearcherController@online_tasks');

// showing task to be performed
Route::get('perform-task/{assistance_id}', 'ResearcherController@perform_task');

// viewing all performed task
Route::get('researcher-performed-tasks', 'ResearcherController@performed_tasks');

// sold articles
Route::get('sold-articles', 'ResearcherController@sold_articles');


// performed assistance

// assistance performed
Route::post('assistance-performed/{assistance_id}/{searcher_id}', 'performedAssistanceController@assistance_performed');




// for searcher

 // showing all researchers
 Route::get('searcher-view-all-researchers','SearcherController@all_researchers');

 //showing all researchpapers
Route::get('searcher-view-all-researchpapers','SearcherController@all_researchpapers');

//showing all journals researchpapers
Route::get('searcher-view-all-journals','SearcherController@all_journals');

//showing all conferences researchpapers
Route::get('searcher-view-all-conferences','SearcherController@all_conferences');

// perform Assistance
Route::get('conduct-assistance','SearcherController@conduct_assistance');

// perform survey
Route::get('perform-survey/{id}', 'SearcherController@perform_survey');

// view  all assistance for searcher
Route::get('all-assistances', 'SearcherController@all_assistances');

 // viewing performed assistances
Route::get('performed-assistances', 'SearcherController@performed_assistances');

// viewing buy article form
Route::get('buy-article/{id}', 'SearcherController@show_buy_article');

// buyed article
Route::get('buyed-articles', 'SearcherController@buyed_articles');



// buy article
Route::post('buy-article/{id}/{searcher_id}', 'SellArticleController@buy_article');


// survey performed
Route::post('survey-performed/{id}/{researcher_id}', 'PerformedSurveyController@survey_performed');



// admin


Route::get('/admin-showregister', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin-showregister');
Route::get('/admin-showlogin', 'AdminAuth\LoginController@showLoginForm')->name('admin-showlogin');

Route::Post('/admin-register', 'AdminAuth\RegisterController@register')->name('admin-register');
Route::Post('/admin-login', 'AdminAuth\LoginController@login')->name('admin-login');


 Route::get('/admin-profile','AdminController@showTable');

// showing all researchers
Route::get('admin-view-all-researchers','AdminController@all_researchers');

//showing all researchpapers
Route::get('admin-view-all-researchpapers','AdminController@all_researchpapers');

//showing all journals researchpapers
Route::get('admin-view-all-journals','AdminController@all_journals');

//showing all conferences researchpapers
Route::get('admin-view-all-conferences','AdminController@all_conferences');

//admin search researchers from navbar
Route::get('admin/search/researchers','AdminController@researcher_search');

// searching all articles of specific researcher from admin profile
Route::get('/admin-view-researcher-articles/{id}', 'AdminController@show_researcher_articles');

// getting the article detail view for admin to see other researchers article details
Route::get('/admin-view-other-researchpaper/{id}' , 'AdminController@search_researcher_article_detail');

// admin view pending Articles
Route::get('/pending-articles' , 'AdminController@show_pending_articles');

// admin approve
Route::get('/admin-approved/{id}' , 'AdminController@approve_article');


// notification mark as read for admin
Route::get('/admin-markAsRead', function(){

  auth()->guard('admin')->user()->unreadNotifications->markAsRead();
  return redirect('admin-profile');
})->name('admin-markAsRead');


  // notification mark as read for researcher
  Route::get('/markAsRead', function(){

    auth()->guard('researcher')->user()->unreadNotifications->markAsRead();
    return redirect('researcher-profile');
  })->name('markAsRead');


  // notification mark as read for searcher
  Route::get('/searcher-markAsRead', function(){

    auth()->guard('searcher')->user()->unreadNotifications->markAsRead();
    return redirect('searcher-profile');
  })->name('searcher-markAsRead');


  // download PDF
  Route::get('download-pdf/{id}', 'ResearchpaperController@download_pdf');


 // all article search
 Route::get('all-articles-search', 'ResearchpaperController@all_articles_search');

  // delete notification for researcher
  Route::get('researcher-delete-notifications', 'ResearcherController@delete_notifications');

  // delete notification for searcher
  Route::get('searcher-delete-notifications', 'SearcherController@delete_notifications');

  // delete notification for admin
  Route::get('admin-delete-notifications', 'AdminController@delete_notifications');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
