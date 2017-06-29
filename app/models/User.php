<?php

class User extends BaseModel
{
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "user";
	}

	public function initialize()
	{
		parent::initialize();
		$this->hasMany('id','project','user_id');
	}

	public function beforeValidationOnCreate()
	{
		if($this->email == "test@test.com")
		{
			die("This email is too common!");
		}
	}

} 
?>
