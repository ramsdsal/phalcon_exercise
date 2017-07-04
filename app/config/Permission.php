<?php
use	Phalcon\Mvc\Dispatcher,
 	Phalcon\Events\Event,
	Phalcon\Acl;

class Permission  extends \Phalcon\Mvc\User\Plugin
{
	/**
	* Constants to prevent a typo
	*/
	const GUEST = 'guest';
	const USER = 'user';
	const ADMIN = 'admin';

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

	public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
	{
		//return;
		$role = $this->session->get('role');
		if(!$role)
		{
			$role = self::GUEST;
		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		//get the Acl Rule List
		$acl = $this->_getAcl();
		
		$allowed = $acl->isAllowed($role,$controller,$action);
		
		if($allowed != Acl::ALLOW)
		{
			//do something
			$this->flash->error("You do not have permission to access this area.");
			$this->response->redirect('index');
			
			//Stop the dispatcher
			return false;
		}
	}

	protected function _getAcl()
	{
		if(!isset($this->persistent->acl))
		{
			$acl = new Acl\Adapter\Memory();
			$acl->setDefaultAction(Acl::DENY);

			$roles = [
				self::GUEST => new Acl\Role(self::GUEST),
				self::USER => new Acl\Role(self::USER),
				self::ADMIN => new Acl\Role(self::ADMIN)
			];

			foreach($roles as $role)
			{
				$acl->addRole($role);
			}

			//public resources
			foreach($this->_publicResources as $resource => $action)
			{
				$acl->addResource(new Acl\Resource($resource),$action);
			}

			//user resources
			foreach($this->_userResources as $resource => $action)
			{
				$acl->addResource(new Acl\Resource($resource),$action);
			}

			//admin resources
			foreach($this->_adminResources as $resource => $action)
			{
				$acl->addResource(new Acl\Resource($resource),$action);
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
					$acl->allow(self::USER,$resource,$action);
					$acl->allow(self::ADMIN,$resource,$action);	
				}
			}
			//Allow admin
			foreach($this->_adminResources as $resource => $actions)
			{
				foreach($actions as $action)
				{
					$acl->allow(self::ADMIN,$resource,$action);						
				}
			}

			$this->persistent->acl = $acl;
		}
		return $this->persistent->acl;
	}
}