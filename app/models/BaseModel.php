<?php 
use \Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class BaseModel extends Model
{

	public function initialize()
	{	
		$this->addBehavior(new SoftDelete([
			'field' => 'deleted',
			'value' => 1
		]));
	}

	public function beforeCreate()
	{
		$this->created_at = date("Y-m-d H:i:s");
	}

	public function beforeUpdate()
	{
		$this->updated_at = date("Y-m-d H:i:s");
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
