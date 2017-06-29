<?php
use \Phalcon\Mvc\Model;

class Project extends Model
{
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "user";
	}
} 
?>