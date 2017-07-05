<?php
date_default_timezone_set('utc');

$config = new \Phalcon\Config([
	'db' => [
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'learning-phalcon'
	],
	'environment' => 'staging'	
]);

$api = new \Phalcon\Config([
	'fb'=>[
		'appId' => '123',
		'appSecret' => '345'
	],
	'aws' => [
		'cloudfrontPem' => 'file.pem',
		'clodfrontKey' => 'A$432423423'
	]
]);
?>