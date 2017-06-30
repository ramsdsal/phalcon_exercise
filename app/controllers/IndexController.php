<?php
use \Phalcon\Mvc\View;

class IndexController extends BaseController
{
	public function indexAction()
	{
		

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