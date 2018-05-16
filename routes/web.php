<?php

Auth::routes();

Route::get('/',function (){return view('welcome');})->name('Welcome');

Route::get('/home','HomeController@index')->name('home');
Route::post('/home','HomeController@search')->name('search');

Route::get('/home/workad/{workAd}', 'HomeController@workAd')->name('workAd');
Route::get('/home/workad/{workAd}/apply/{user}', 'WorkAdController@apply')->name('applyApplication');
Route::get('/home/workad/{workAd}/cancel', 'WorkAdController@cancel')->name('cancelApplication');



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
Route::get('/home/workad/{workAd}/profile/{application}', 'ProfileController@EmployerViewWorker')->name('EmployerViewWorker');




Route::get('/home/workads','AdminController@workads')->name('adminAds');
Route::get('/home/companies','AdminController@companies')->name('adminCompanies');
Route::get('/home/workers','AdminController@workers')->name('adminWorkers');
Route::get('/home/workers/{user}','AdminController@viewWorker')->name('adminViewWorker');

Route::post('/sendMessage','MessageController@send')->name('message');
Route::post('/confirm/{applications}','MessageController@comfirmed')->name('comfirmed');
Route::post('/decline/{applications}','MessageController@declined')->name('declined');
Route::get('/sendMessage/','MessageController@chats')->name('chats');
Route::get('/sendMessage/chat/{user}','MessageController@chat1o1')->name('chat1o1');

Route::get('/notifications','HomeController@notifications')->name('notifications');
Route::get('/update','HomeController@update')->name('update');

Route::get('/home/create/test', 'TestController@index');

Route::post('/home/create/test', 'TestController@createTest');

Route::get('/home/tests/', 'TestController@tests');

Route::get('/home/create/test/addquestion/{testid}', 'TestController@addQ');

Route::post('/home/create/test/addquestion/', 'TestController@addQuestion')->name('addq');

Route::get('/home/tests/delete/{test}', 'TestController@deleteTest');
Route::get('/home/tests/edit/delete/{question}', 'TestController@deleteQuestion');

Route::get('/home/tests/{test}', 'TestController@testDetails');
Route::post('/home/tests/{test}', 'TestController@editSave');

Route::get('/home/tests/question/{question}', 'TestController@editQuestion');
Route::post('/home/tests/question/{question}', 'TestController@saveEditQuestion');

Route::get('/home/tests/{test}/add', 'TestController@addQuestionToTest');
Route::post('/home/tests/{test}/add', 'TestController@addQuestionToTestSave');

Route::get('/home/applicants/', 'WorkAdController@applicants');

Route::get('/home/applicants/assign/{user}', 'WorkAdController@assign');
Route::post('/home/applicants/assign/{user}', 'WorkAdController@assignCreate');

Route::get('/home/applicants/assignTask/{user}', 'WorkAdController@assignTask');
Route::post('/home/applicants/assignTask/{user}', 'WorkAdController@assignCreateTask');





Route::get('/home/mytests/', 'TestController@workerTests');
Route::get('/home/mytests/{result}', 'TestController@workerTestsDo');
Route::post('/home/mytests/{result}', 'TestController@workerTestSave');
Route::get('/home/results/', 'ResultController@index');
Route::get('/home/results/{result}', 'ResultController@single');

Route::get('/home/mytests/task/{task_files}', 'TestController@workerTasksDo');
Route::post('/home/mytests/task/{task_files}', 'TestController@workerTaskUpload');

Route::get('/home/results/tasks/{task_files}', 'ResultController@getTask');
Route::get('/home/results/tasks/download/{task_files}', 'ResultController@getDownload');





Route::post('/updateMsg','MessageController@updateMsg')->name('updateMsg');




Route::get('/home/tasks/', 'TestController@tasks');

Route::get('/home/tasks/{task}', 'TestController@taskDetails');
Route::post('/home/tasks/{task}', 'TestController@editSaveTask');

Route::get('/home/tasks/delete/{task}', 'TestController@deleteTask');