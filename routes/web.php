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

Route::get('/', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('user', 'UsersController@show')->name('user.show');

/*Route des annonces, ajout de la contrainte d'être connecter pour edit d'une annonce plus personnalisation des vues index et show */

Route::resource('annonces', 'AdController')
    ->parameters(['annonces'=>'ad'])
    ->except(['index', 'show', 'destroy'])->middleware('auth');

/*Route personnalisée, gère aussi bien le show, la gestion des deux types d'annonce et de la recherche ajax sur la page d'accueil
et sur la page index des annonces.*/ 
Route::prefix('annonces')->group(function(){
    Route::get('voir/{ad?}', 'AdController@show')->name('annonces.show');
    Route::post('', 'AdController@index')->name('annonces.index');
    Route::post('recherche', 'AdController@search')->name('annonces.search');
    Route::post('offre', 'AdController@offer')->name('annonces.offer');
    Route::post('/{ad?}', 'AdController@destroy')->name('annonces.destroy');
    Route::get('/search/{categories?}', 'AdController@indexByType')->name('annonces.indexByType');
});

Route::post('searchA', 'Adcontroller@ajaxSearch')->name('ajaxSearch');