<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['as' => 'welcome', 'uses' => 'AccueilController@listAccueil']);

Route::get('/informations/create', ['as' => 'infos.create', 'uses' => 'SimulationController@create']);
Route::post('/informations/store', ['as' => 'infos.store', 'uses' => 'SimulationController@store']);




Route::get('/chauffeurs-list', ['as' => 'chauffeurs.list', 'uses' => 'ChauffeurController@list']);
Route::get('/chauffeur/show/{id}', ['as' => 'chauffeurs.show', 'uses' => 'ChauffeurController@show']);

Route::get('/chauffeur/create', ['as' => 'chauffeurs.create', 'uses' => 'ChauffeurController@create']);
Route::post('/chauffeur/store', ['as' => 'chauffeurs.store', 'uses' => 'ChauffeurController@store']);

Route::get('/chauffeur/edit/{id}', ['as' => 'chauffeurs.edit', 'uses' => 'ChauffeurController@edit']);
Route::put('/chauffeur/update/{id}', ['as' => 'chauffeurs.update', 'uses' => 'ChauffeurController@update']);

Route::delete('/chauffeur/delete/{id}', ['as' => 'chauffeurs.delete', 'uses' => 'ChauffeurController@delete']);




Route::get('/voitures-list', ['as' => 'voitures.list', 'uses' => 'VoitureController@list']);
Route::get('/voitures-list-parking', ['as' => 'voitures.list.parking', 'uses' => 'VoitureController@listParking']);
Route::get('/voitures-list-dispo', ['as' => 'voitures.list.dispo', 'uses' => 'VoitureController@listDispo']);
Route::get('/voitures-list-deRelais', ['as' => 'voitures.list.deRelais', 'uses' => 'VoitureController@listDeRelais']);
Route::get('/voiture/show/{id}', ['as' => 'voitures.show', 'uses' => 'VoitureController@show']);

Route::get('/voiture/create', ['as' => 'voitures.create', 'uses' => 'VoitureController@create']);
Route::post('/voiture/store', ['as' => 'voitures.store', 'uses' => 'VoitureController@store']);

Route::get('/voiture/edit/{id}', ['as' => 'voitures.edit', 'uses' => 'VoitureController@edit']);
Route::put('/voitures/update/{id}', ['as' => 'voitures.update', 'uses' => 'VoitureController@update']);

Route::delete('/voiture/delete/{id}', ['as' => 'voitures.delete', 'uses' => 'VoitureController@delete']);




Route::get('/visites-list', ['as' => 'visites.list', 'uses' => 'VisiteController@list']);
Route::post('/visites-list/check',['as' =>'visites.check','uses' => 'VisiteController@check']);
Route::get('/visite/show/{id}', ['as' => 'visites.show', 'uses' => 'VisiteController@show']);

Route::get('/visites/create', ['as' => 'visites.create', 'uses' => 'VisiteController@create']);
Route::post('/visites/store', ['as' => 'visites.store', 'uses' => 'VisiteController@store']);

Route::get('/visites/edit/{id}', ['as' => 'visites.edit', 'uses' => 'VisiteController@edit']);
Route::put('/visites/update/{id}', ['as' => 'visites.update', 'uses' => 'VisiteController@update']);

Route::delete('/visites/delete/{id}', ['as' => 'visites.delete', 'uses' => 'VisiteController@delete']);





Route::get('/rip', ['as' => 'rip.rip', 'uses' => 'Controller@rip']);
