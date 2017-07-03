<?php
use \Phalcon\Mvc\User\Plugin;
use	\Phalcon\Mvc\Dispatcher;
use \Phalcon\Acl\Adapter\Memory;
use \Phalcon\Acl\Role;
use \Phalcon\Events\Event;

class Permission  extends Plugin
{
	protected $_publicResources = [
		'index' => '*',
		'signin' => '*'

	];
	protected $_userResources = [
		'dashboard' => ['*'],
	];
	protected $_adminResources = [
		'admin' => ['*'],
	];

	protected function _getAcl()
	{
		if(!isset($this->persistent->acl))
		{
			$acl = new Memory();
			$acl->setDefaultAction(Phalcon\Acl::DENY);

			$roles = [
				'guest' => new Role('guest'),
				'user' => new Role('user'),
				'admin' => new Role('admin'),
			];

			foreach($roles as $role)
			{
				$acl->addRole($role);
			}

			//public resources
			foreach($this->_publicResources as $resource => $action)
			{
				$acl->addResource(new \Phalcon\Acl\Resource($resource),$action);
			}

			//user resources
			foreach($this->_userResources as $resource => $action)
			{
				$acl->addResource(new Phalcon\Acl\Resource($resource),$action);
			}

			//admin resources
			foreach($this->_adminResources as $resource => $action)
			{
				$acl->addResource(new \Phalcon\Acl\Resource($resource),$action);
			}

			//Allow everyone 
			foreach($roles as $role)
			{
				foreach($this->_publicResources as $resource => $action)
				{
					//echo $role->getName();
					//echo $resource;
					$acl->allow($role->getName(),$resource,'*');	
				}				
			}		
			//die;				
			//Allow everyone 
			foreach($this->_userResources as $resource => $actions)
			{
				foreach($actions as $action)
				{
					$acl->allow('user',$resource,$action);
					$acl->allow('admin',$resource,$action);	
				}
			}
			//Allow admin
			foreach($this->_adminResources as $resource => $actions)
			{
				foreach($actions as $action)
				{
					$acl->allow('admin',$resource,$action);						
				}
			}

			$this->persistent->acl = $acl;
		}
		return $this->persistent->acl;
	}	

	public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
	{
		//return;
		$role = $this->session->get('role');
		if(!$role)
		{
			$role = 'guest';
		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		//get the Acl Rule List
		$acl = $this->_getAcl();
		
		$allowed = $acl->isAllowed($role,$controller,$action);
		
		if($allowed != Phalcon\Acl::ALLOW)
		{
			//do something
			$dispatcher->forward([
				'controller' => 'index',
				'action' => 'index'
			]);
			//Stop the dispatcher
			return false;
		}
	}
}