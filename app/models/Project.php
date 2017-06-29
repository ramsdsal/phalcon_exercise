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

	public function initialize()
	{
		$this->belongsTo('user_id','user','id');
	}

	public function createAction()
	{	
		
	}

} 
?>