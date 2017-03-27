<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected static $rules = array(
		'name' => 'required',
		'email' => 'required|email',
		'content' => 'required'
		);

	protected static $messages = array(
		'name.required' => '姓名為必填項目',
		'email.required' => 'email為必填項目',
		'email.email' => 'email必須符合格式',
		'content.required' => '內容為必填項目'
		);

	public static function validate($input)
	{
		$validator = \Validator::make($input, self::$rules, self::$messages);
		if ($validator->fails()) {
			return $validator;
		}
		return true;
	}

	public static function saveByInput($input)
	{
		$validator = self::validate($input);
		if ($validator !== true) {
			return $validator;
		}

		$Message = new Message();
		$Message->name = $input["name"];
		$Message->email = $input["email"];
		$Message->content = $input["content"];
		$Message->save();

		return true;
	}

	public static function deleteByID($id)
	{
		$Message = Message::find($id);

		if (!$Message) {
			return false;
		}

		$Message->delete();

		return true;
	}

	public static function getByID($id)
	{
		$Message = Message::find($id);

		if (!$Message) {
			return false;
		}

		return $Message;
	}

	public static function updateByInput($id, $input)
	{
		$Message = Message::find($id);

		if (!$Message) {
			return false;
		}

		$Message->name = $input["name"];
		$Message->email = $input["email"];
		$Message->content = $input["content"];
		$Message->update();

		return true;
	}



}
