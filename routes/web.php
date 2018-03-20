<?php

Auth::routes();

Route::get('/',function (){return view('welcome');})->name('Welcome');

Route::get('/home','HomeController@index')->name('home');
Route::post('/home','HomeController@search')->name('search');

Route::get('/home/workad/{workAd}', 'HomeController@workAd')->name('workAd');

Route::get('/home/company/{company}', 'HomeController@company')->name('company');

Route::get('/home/create/workad', 'WorkAdController@index');
Route::post('/home/create/workad', 'WorkAdController@create')->name('createWorkAd');

Route::get('/home/edit/workad/{workAd}', 'WorkAdController@editindex')->name('editWorkAd');
Route::post('/home/edit/workad/{workAd}', 'WorkAdController@editindex')->name('editWorkAd2');
Route::get('/home/delete/workad/{workAd}', 'WorkAdController@delete')->name('deleteWorkAd');


Route::get('/home/profile/employer/{user}', 'ProfileController@viewEmployer')->name('Eprofile');
Route::get('/home/profile/{user}', 'ProfileController@viewWorker')->name('Wprofile');

Route::get('/home/edit/profile/employer/{user}', 'ProfileController@employer')->name('editProfile');
Route::post('/home/edit/profile/employer/{user}', 'ProfileController@storeEditProfileEmployer')->name('editProfle2');
Route::get('/home/delete/profile/{user}', 'ProfileController@delete')->name('deleteUser');


Route::get('/home/edit/profile/{user}', 'ProfileController@editProfileWorker')->name('editProfileWorker');
Route::post('/home/edit/profile/{user}', 'ProfileController@storeEditProfileWorker')->name('editProflePost');



Route::get('/home/workads','AdminController@workads')->name('adminAds');
Route::get('/home/companies','AdminController@companies')->name('adminCompanies');
Route::get('/home/workers','AdminController@workers')->name('adminWorkers');
Route::get('/home/workers/{user}','AdminController@viewWorker')->name('adminViewWorker');