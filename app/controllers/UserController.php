<?php
use \Phalcon\Mvc\Controller;

class UserController extends Controller
{
	public function indexAction()
	{
		$this->view->setVars([
			'single' => User::findFirstById(1),
			'all' => User::find([
				'deleted is NULL'
			])
		]);

	}

	public function createAction()
	{	
		$user = new User();
		$user->email = "test@test11.com";
		$user->password = "test";
		$result = $user->create();

		if(!$result)
		{
			print_r($user->getMessages());
		}

	}

	public function updateAction()
	{
		$user = User::findFirstById(11);
		
		if(!$user)
		{
			echo "User does not exist!";
			die;
		}

		$user->email = "updated@asds.com";		
		$result = $user->update();

		if(!$result)
		{
			print_r($user->getMessages());
		}
	}

	public function deleteAction()
	{
		$user = User::findFirstById(1);		
		if(!$user)
		{
			echo "User does not exist!";
			die;
		}

		$result = $user->delete();
		if(!$result)
		{
			print_r($user->getMessages());
		}
	}

	public function createAssocAction()
	{
		$user = User::findFirstById(1);
		$project = new Project();
		$project->user = $user;
		$project->title = "Moonwalker";
		$result = $project->create();
		if(!$result)
		{
			print_r($project->getMessages());
		}
	}

	public function deleteAssocAction()
	{
		$project = Project::findFirstById(1);
		$result = $project->delete();

		if(!$result)
		{
			print_r($project->getMessages());
		}
	}
}

?>
