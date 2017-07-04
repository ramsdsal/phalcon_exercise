<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class SigninController extends BaseController
{
	
	public function indexAction()
	{
		Tag::setTitle('Signin');
		$this->assets->collection('additional')->addCss('css/signin.css');
		parent::initialize();
	}	

	public function doSigninAction()
	{
		if($this->security->checkToken() == false)
		{
			$this->flash->error('Invalid CSRF Token');
			$this->response->redirect('signin/index');
			return;
		}

		$this->view->disable();
		$email = $this->request->getPost('email'); 
		$password = $this->request->getPost('password');

		$user = User::findFirstByEmail($email);		

		/*$user = User::findFirst([
			"email = :email: AND password = :password:",
			"bind" => [
				"email" => $this->request->getPost('email'),
				"password" => $this->request->getPost('password')
			]
		]);*/

		if($user)
		{
			if($this->security->checkHash($password,$user->password))
			{
				$this->session->set('id',$user->id);
				$this->session->set('role',$user->role);
				$this->response->redirect('dashboard/index');
				return;
			}
		}
		
		$this->flash->error("Incorrect credentials");
		$this->response->redirect('signin/index');
	}
}

?>