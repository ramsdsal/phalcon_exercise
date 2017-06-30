<?php 
use \Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	
	public function initialize()
	{
		$this->assets->addCss('css/style.css')
		 			 ->addJs('third-party/js/jquery.min.js');
	}
}
