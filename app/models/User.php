<?php
use \Phalcon\Mvc\Model;

class User extends Model
{
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "user";
	}
} 
?>
