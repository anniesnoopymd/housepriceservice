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

//��l�s��/message�h�I�scontroller�Aget�{�����
Route::get('/message', ['as' => 'message.index', 'uses' => 'MessageController@index']);
//Route::get('/���}', ['as' => '��ڥh�쪺����', 'uses' => '�n�Ϊ�controller->MessageController(collator��)@index(�Ϊ���k)']);

//�s�W���
Route::post('/message/store', ['as' => 'message.store', 'uses' => 'MessageController@store']);

//���U�s���A�h�������controller�H"���"�s��form
Route::get('/message/edit/{id}', ['as' => 'message.edit', 'uses' => 'MessageController@edit']);

//�s�觹��A���U����������controller
Route::post('/message/update/{id}', ['as' => 'message.update', 'uses' => 'MessageController@update']);

//�R�R
Route::get('/message/delete/{id}', ['as' => 'message.destroy', 'uses' => 'MessageController@destroy']);

/*
|�b�o�ӽd�Ҥ��A�s��(edit/update)�M�R��(delete)�A�L�̳��O�a�@�Ӭy�����Ѽ�id�h�R�諸�A
|�]���ϥΪ��s�����ɭԡA�s�����}�򥻤W�n�O�u/����/�ʧ@/�Ѽơv�o�˪��κA��
*/