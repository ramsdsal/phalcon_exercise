<?php 
use \Phalcon\Mvc\Controller;
use \Phalcon\Assets\Filters\Cssmin;
use \Phalcon\Assets\Filters\Jsmin;
use \Phalcon\Tag;


class BaseController extends Controller
{
	
	public function initialize()
	{
		Tag::prependTitle('Fireball | ');
		//Set css style settings
		$this->assets
			 ->collection('style')
			 ->addCss('third-party/css/bootstrap.min.css',false,false)
			 ->addCss('css/style.css')
			 ->setTargetPath('css/production.css')
			 ->setTargetUri('css/production.css')
			 ->join(true)
			 ->addFilter(new Cssmin());

		//Set Js files settings
		$this->assets
			 ->collection('js')
			 ->addCss('third-party/js/jquery.min.js',false,false)
			 ->addCss('third-party/js/bootstrap.min.js',false,false)		 
			 ->setTargetPath('third-party/js/production.js')
			 ->setTargetUri('third-party/js/production.js')
			 ->join(true)
			 ->addFilter(new Jsmin());

	}
}
