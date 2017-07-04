<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class AdminController extends BaseController
{	

	public function indexAction()
	{
		Tag::setTitle('Admin');
	}	
}
?>