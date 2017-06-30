<?php 
use \Phalcon\Mvc\Controller;

class TestController extends Controller
{
	
	public function jumpAction($id=NULL)
	{	
		echo __FUNCTION__;
		echo $id;
	}

	public function flyAction()
	{
		echo __FUNCTION__;
		print_r($this->dispatcher->getParams());			
	}
}
