<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// for ResearchPaper

//list all researchpapers
Route::get('researchpapers','ResearchpaperController@index');

//list single researchpaper
Route::get('researchpaper/{id}','ResearchpaperController@show');

//create a researchpaper
Route::post('researchpaper/{id}','ResearchpaperController@store');

//update a researchpaper
Route::patch('researchpaper/{id}','ResearchpaperController@update');

// delete a researchpaper
Route::delete('researchpaper/{id}','ResearchpaperController@destroy');



// for Surveys

//list all surveys
Route::get('surveys','SurveyController@index');

//list single survey
Route::get('survey/{id}','SurveyController@show');

//create a survey
Route::post('survey/{id}','SurveyController@store');

//update a survey
Route::patch('survey/{id}','SurveyController@update');

// delete a survey
Route::delete('survey/{id}','SurveyController@destroy');

//for Advertisements


//list single advertisement
Route::get('advertisement/{id}','AdvertisementController@show');
//create advertisement
Route::post('advertisement/{id}','AdvertisementController@store');
//update  advertisement
Route::patch('advertisement/{id}','AdvertisementController@update');
// delete advertisement
Route::delete('advertisement/{id}','AdvertisementController@destroy');


// for Assistance

Route::post('conduct-assistance/{searcher_id}', 'ConductAssistanceController@store');


// for researcher

// update researcher profile
Route::post('researcher_update_profile/{id}' , 'ResearcherController@update_profile');

// for searcher

// update searcher profile
Route::post('searcher_update_profile/{id}' , 'SearcherController@update_profile');
