<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class DashboardController extends BaseController
{	

	public function indexAction()
	{
		Tag::setTitle('Dashboard');
		die;
	}	
}
?>