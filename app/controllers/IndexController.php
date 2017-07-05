<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class IndexController extends BaseController
{
	public function indexAction()
	{
		Tag::setTitle('Home');
		parent::initialize();

		/*
			$gateway = \Omnipay\Omnipay::create('Stripe');
			$gateway->setApiKey('123');

			print_r($gateway);
			$fb = new \Facebook([
				'appId' => 123,
				'secret' => 123
			]);
			print_r($fb);
			die;
		*/
	}

	public function signoutAction()
	{
		$this->session->destroy();
		$this->response->redirect('index/');
	}	

	public function generatePasswordAction($password)
	{
		echo $this->security->hash($password);
	}

	//temporary data below

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