<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class SigninController extends BaseController
{
	
	public function indexAction()
	{
		Tag::setTitle('Signin');
		$this->assets->collection('additional')->addCss('css/signin.css');
	}	
}

?>