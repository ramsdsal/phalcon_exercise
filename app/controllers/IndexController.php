<?php
use \Phalcon\Mvc\Controller;
use \Phalcon\Mvc\View;

class IndexController extends Controller
{
	public function indexAction()
	{
		echo "Hello world!";
	}	

	public function startSessionAction()
	{		
		$this->session->set('name','jesse');	
		$this->session->set('user',[
			'name' => 'ted',
			'age' => 50,
			'soOn' => 'soForth'
		]);	

	}

	public function getSessionAction()
	{
		echo $this->session->get('name');
		print_r($this->session->get('user'));		
	}

	public function removeSessionAction()
	{
		$this->session->remove('name');		
	}

	public function destroySessionAction()
	{
		$this->session->destroy('name');		
	}
}
?>