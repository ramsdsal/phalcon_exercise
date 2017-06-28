<?php 
use \Phalcon\Exception;
use \Phalcon\Loader;
use \Phalcon\Mvc\Application;
use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\View;

try
{
	//Create the Loader
	$loader = new Loader();
	$loader->registerDirs([
		'../app/controllers/',
		'../app/models/'
	]);
	$loader->register();

	//set the dependency injection
	$di = new FactoryDefault();
	//Path to the views
	$di->set('view',function()
	{
		$view = new View();
		return $view->setViewsDir('../app/views');		
	});


	//Deploy the application
	$app = new Application($di);
	echo $app->handle()->getContent();

}
catch(Exception $e)
{
	echo $e->getMessage();
}


?>
