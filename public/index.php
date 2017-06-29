<?php 
include('../app/config/db.php');
use \Phalcon\Exception;
use \Phalcon\Loader;
use \Phalcon\Mvc\Application;
use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\View;
use \Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\Model\MetaData\Apc;

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


	//Deploy the application
	$app = new Application($di);
	echo $app->handle()->getContent();

}
catch(Exception $e)
{
	echo $e->getMessage();
}


?>
