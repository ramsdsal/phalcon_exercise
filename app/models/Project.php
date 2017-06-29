<?php
use \Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class Project extends Model
{
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "project";
	}

	public function initialize()
	{	
		$this->addBehavior(new SoftDelete([
			'field' => 'deleted',
			'value' => 1
		]));
	}
} 
?>