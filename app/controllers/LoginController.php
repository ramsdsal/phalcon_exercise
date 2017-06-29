<?php
use \Phalcon\Mvc\Controller;
use \Phalcon\Mvc\View;

class LoginController extends Controller
{
	public function initialize()
	{
		$this->view->setTemplateAfter('default');
	}

	public function indexAction()
	{
		
	}

	public function processAction($username = false, $age = 12)
	{
		echo "Processing</br>";
		$this->view->setVar('username',$username);
		$this->view->setVar('age',$age);
		//$this->view->disableLevel(View::LEVEL_AFTER_TEMPLATE);

	}	
}

?>