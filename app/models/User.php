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
		$this->hasMany('id','project','user_id');
	}

} 
?>
