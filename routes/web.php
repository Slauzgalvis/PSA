<?php

Auth::routes();

Route::get('/',function (){return view('welcome');});

Route::get('/home','HomeController@index')->name('home');

Route::get('/home/workad/{workAd}', 'HomeController@workAd')->name('workAd');

Route::get('/home/company/{company}', 'HomeController@company')->name('company');


/*
Route::get('/home/workad/create', 'WorkAdController@create')->name('createWorkAd');
Route::post('/home/workad/create', 'WorkAdController@create');

Route::get('/home/workad/edit/{workAd}', 'WorkAdController@edit')->name('editWorkAd');
Route::post('/home/workad/create', 'WorkAdController@edit');

Route::post('/home/workad/delete/', 'WorkAdController@delete')->name('deleteWorkAd');
*/