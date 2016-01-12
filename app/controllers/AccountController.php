<?php

class AccountController extends ControllerBase
{
	public function loginAction()
	{	
		if($this->session->has('uid')) {
			$this->response->redirect('/');
		}else{
			$error = array(
				'email' => '',
				'pass' => '',
				'fname' => '',
				'lname' => ''
			);
			$isError = 0;
			if($this->request->isPost()&&$this->request->getPost('login')){
				$email = $this->request->getPost('email');
				$pass = $this->request->getPost('pass');
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error['email'] = 'Please enter an email!';
					$isError = 1;
				}else{
	                $this->view->email = $email;
	            }
				if(empty($pass)) {
					$error['pass'] = 'Please enter the password!';
				}else{
	                $count = strlen($pass);
	                if($count<6){
	                    $error['pass'] = 'The password is least 6 key';
						$isError = 1;
	                }elseif($count>100) {
	                    $error['pass'] = 'The password max 100 key';
						$isError = 1;
	                }
	            }
	            if(!$isError){
	                $user = UserLogin::findFirst(array(
	                	'columns'	 => 'id,pass,code',
	                	'conditions' => 'email = :email:',
	                	'bind'		 => array('email'=>$email)
	                ));
	                if($user) {
	                	if($user->code) {
	                		$error['email'] = 'You didn\'t confirm your account. Please confirm <a href="/account/confirm">here</a>.';
	                	}else{
	                		if($this->security->checkHash($pass, $user->pass)) {
	                			$this->session->set('uid', $user->id);
	                			$this->response->redirect('/');
	                		}else{
	                			$error['pass'] = 'Your password is incorrect!';
	                		}
	                	}
	                }else{
	                	$error['email'] = 'This email is not exists! => <a href="/account/register">Register</a> now?';
	                }
	            }
			}
	        $this->view->error = $error;	
		}
	}
	public function registerAction(){
		if($this->session->has('uid')) {
			$this->response->redirect('/');
			exit();
		}
		if($this->request->isPost()&&$this->request->getPost('register')){
			$error = array();
			$user = new User;
			$user->setFname($this->request->getPost('fname'));
			$user->setLname($this->request->getPost('lname'));

			$login = new UserLogin;
			$login->setEmail($this->request->getPost('email'));
			$login->setPass($this->request->getPost('pass'));

			if(count($user->getError())) $error = array_merge($user->getError(), $error);
			if(count($login->getError())) $error = array_merge($login->getError(), $error);
			if(!count($error)){
				if(UserLogin::findFirstByEmail($login->email)){
					$error['email'] = 'This email is exists!';
				}else{
					if($user->create()){
						$login->id = $user->id;
						$login->pass = $this->security->hash($login->pass);
						if($login->create()){
							$this->session->set('confirm', $user->id);
							$this->response->redirect('/account/confirm');
						}
					}
				}
			}
			$this->view->error = $error;
		}
	}
	public function confirmAction()
	{
		$success = $this->session->has('confirm')?$this->session->get('confirm'):0;
		$error = array('email'=>'', 'code'=>'');
		if($this->request->isPost()&&$this->request->getPost('confirm')){
			$user = new UserLogin;
			$user->setCode($this->request->getPost('code'));
			if(!$success) $user->setEmail($this->request->getPost('email'));
			if(count($user->getError())) $error = array_merge($user->getError(), $error);
			else{
				$login = $success?UserLogin::findFirstById($success):UserLogin::findFirstByEmail($user->email);
				if($login){
					if($login->code){
						if($login->next=='confirm'){
							if($this->code==$user->code) {
								$login->code = NULL;
								$login->next = NULL;
								$login->update();
								$this->session->set('uid', $login->id);
								$this->response->redirect('/');
							}else{
								$error['code'] = 'This code is incorrect!';
							}
						}else{
							$this->view->error_confirm = 'You confirmed!';
						}
					}else{
						$this->view->error_confirm = 'You don\'t request for confirm or change pass';
					}
				}else{
					$this->view->error_confirm = 'This account is not exists!';
				}
			}
		}
		$this->view->error = $error;
		$this->view->success = $success;
	}
} 

?>