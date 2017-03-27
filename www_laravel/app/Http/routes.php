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

Route::get('/', 'WelcomeController@index');
Route::get('blog', 'MessageController@index');

//Route::resource('message', 'MessageController');

//初始瀏覽/message去呼叫controller，get現有資料
Route::get('/message', ['as' => 'message.index', 'uses' => 'MessageController@index']);
//Route::get('/網址', ['as' => '實際去抓的頁面', 'uses' => '要用的controller->MessageController(collator頁)@index(用的方法)']);

//新增資料
Route::post('/message/store', ['as' => 'message.store', 'uses' => 'MessageController@store']);

//按下編輯後，去找對應的controller以"顯示"編輯form
Route::get('/message/edit/{id}', ['as' => 'message.edit', 'uses' => 'MessageController@edit']);

//編輯完後，按下完成的對應controller
Route::post('/message/update/{id}', ['as' => 'message.update', 'uses' => 'MessageController@update']);

//刪刪
Route::get('/message/delete/{id}', ['as' => 'message.destroy', 'uses' => 'MessageController@destroy']);

/*
|在這個範例中，編輯(edit/update)和刪除(delete)，他們都是帶一個流水號參數id去刪改的，
|因此使用者瀏覽的時候，瀏覽網址基本上要是「/網站/動作/參數」這樣的形態喔
*/