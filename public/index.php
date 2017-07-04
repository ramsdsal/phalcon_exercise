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
use \Phalcon\Mvc\Dispatcher;

try
{
	//Create the Loader
	$loader = new Loader();
	$loader->registerDirs([
		'../app/controllers/',
		'../app/models/',
		'../app/config/'		
	]);
	$loader->register();

	//set the dependency injection
	$di = new FactoryDefault();
	//Path to the views
	$di->set('view',function()
	{
		$view = new View();
		$view->setViewsDir('../app/views');
		$view->registerEngines([
			'.volt' => 'Phalcon\Mvc\View\Engine\volt'
		]);
		return $view;		
	});

	//Router
	$di->set('router',function(){
		
		$router = new Router();
		$router->mount(new GlobalRoutes());
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
	//Flash data (Temporary Data)
	$di->set('flash', function () {
        $flash = new Phalcon\Flash\Session([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ]);

        return $flash;
    });    

	//ACL
	$di->set('dispatcher',function() use ($di){
		$eventsManager = $di->getShared('eventsManager');
		
		//Custom ACL class
		$permission = new Permission();

		//Listen for events from the permission class
		$eventsManager->attach('dispatch',$permission);

		$dispatcher = new Dispatcher();
		$dispatcher->setEventsManager($eventsManager);
		return $dispatcher;
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