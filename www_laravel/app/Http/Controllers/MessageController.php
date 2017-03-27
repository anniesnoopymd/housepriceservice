<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		|Message::all()，all()是一個既有寫法，表示前者資料庫的全部，
		|類似select * from messages這樣的感覺
		|24、25行是其他種寫法的參考，只是參考，所以參數我是從其他地方直接複製貼上的(欸)
		*/
		$Messages = Message::all();
		//$users = DB::select('select * from users where active = ?', [1]);
        //return view('user.index', ['users' => $users]);
		return \View::make('blog.index', compact('Messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = \Request::all();

		$validator = Message::saveByInput($input);
		if ($validator !== true) {
			return \Redirect::back()->withInput()->withErrors($validator);
		}
		\Session::flash('status', '成功新增一筆留言!');

		return \Redirect::route('message.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Message = Message::getByID($id);
		if (!$Message) {
			return \Redirect::route('message.index');
		}

		return \View::make('blog.edit', compact('Message'));
		//要怎麼才能讓要編輯的資料進入view(編輯表單中)呢？
		//就是靠compact()，它將要被修改的資料包成一個陣列，再傳進edit這個view裡
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = \Request::all();
		//下面這行是要去叫Message這個ORM裡的關於修改的方法
		$update = Message::updateByInput($id, $input);
		//上面這行遇到瓶頸的話，請參考下方的方法吧！

		if (!$update) {
			return \Redirect::back();
		}
		\Session::flash('status', '成功修改一筆留言!');

		return \Redirect::route('message.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$delete = Message::deleteByID($id);
		if ($delete) {
			\Session::flash('status', '成功刪除一筆留言!');
		}
		return \Redirect::route('message.index');
	}

}

//參考資料：http://blog.tonycube.com/2015/01/laravel-10.html