<?php

class LoginController extends Controller{
	
	protected $userObject;
   
	public function do_login(){
	 	
		$this->userObject = new User();
		
		$password = md5(sha1($_POST['password1']));

		if($this->userObject->checkUser($_POST['email'],$password)){
			
			$userInfo = $this->userObject->getUserFromEmail($_POST['email']);
			
			$_SESSION['uID'] = $userInfo['uID'];
			
			if(strlen($_SESSION['redirect']) > 0){
			
				$view = $_SESSION['redirect'];
				unset($_SESSION['redirect']);
				
				header('Location: '.BASE_URL.$view);
						
			}else{
				header('Location: '.BASE_URL);
			}

		}else{
			
			$this->set('error', 'Wrong password/email combination');
		}
	}
	
	public function logout(){
		//unset the session	
		unset($_SESSION['uID']);
		
		//close the session
		session_write_close();
		
		//Redirect user to the homepage
		header('Location: '.BASE_URL);		
	}
	
	public function index(){
		$this->set('task', 'do_login');	
	}
	
}