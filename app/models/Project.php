<?php
use \Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class Project extends BaseModel
{
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "project";
	}

} 
?>