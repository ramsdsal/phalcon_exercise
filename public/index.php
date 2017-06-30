<?php 
include('../app/config/db.php');
use \Phalcon\Exception;
use \Phalcon\Loader;
use \Phalcon\Mvc\Application;
use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\View;
use \Phalcon\Db\Adapter\Pdo\Mysql;
use \Phalcon\Mvc\Model\MetaData\Apc;
use \Phalcon\Session\Adapter\Files;
use \Phalcon\Mvc\Router;

try
{
	//Create the Loader
	$loader = new Loader();
	$loader->registerDirs([
		'../app/controllers/',
		'../app/models/',
		'../app/config/',
	]);
	$loader->register();

	//set the dependency injection
	$di = new FactoryDefault();
	//Path to the views
	$di->set('view',function()
	{
		$view = new View();
		$view->setViewsDir('../app/views');
		return $view;		
	});

	//Router
	$di->set('router',function(){
		
		$router = new Router();
		$router->mount(new Routes());
		return $router;
	});
	
	$di->set('db',function(){
		$db = new Mysql([
			'host' => DB_HOST,
			'username' => DB_USERNAME,
			'password' => DB_PASSWORD,
			'dbname' => DB_NAME
		]);
		return $db;		
	});

	//Meta-Data
	$di['modelsMetadata'] = function () {
    // Create a metadata manager with APC
    $metadata = new Apc(
        [
            'lifetime' => 86400,
            'prefix'   => 'metaData',
        ]
    );

    return $metadata;
	};

	//Session
	$di->setShared('session',function(){
		$session = new Files();
		$session->start();
		return $session;
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
