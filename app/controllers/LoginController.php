<?php
use \Phalcon\Mvc\Controller;

class LoginController extends Controller
{
	public function initialize()
	{
		echo "** INIT **</br>";
	}

	public function indexAction()
	{
		echo "Login!";
	}

	public function processAction($username = false, $age = 12)
	{
		echo "Processing</br>";
		echo $username.'</br>';
		echo $age.'</br>';

		$this->dispatcher->forward(['controller'=>'login','action'=>'test']);
	}

	public function testAction(){
		echo "-- TEST ACTION --";
	}
}

?>