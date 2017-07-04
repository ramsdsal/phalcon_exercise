<?php
use \Phalcon\Mvc\View;
use \Phalcon\Tag;

class SigninController extends BaseController
{
	
	public function indexAction()
	{
		Tag::setTitle('Signin');
		$this->assets->collection('additional')->addCss('css/signin.css');
	}	

	public function doSigninAction()
	{
		$this->view->disable();
		$user = User::findFirst([
			"email = :email: AND password = :password:",
			"bind" => [
				"email" => $this->request->getPost('email'),
				"password" => $this->request->getPost('password')
			]
		]);

		if($user)
		{
			$this->session->set('id',$user->id);
			$this->session->set('role',$user->role);

			return;
		}
		$this->flash->error("Incorrect credentials");
		$this->response->redirect('signin/index');
	}
}

?>