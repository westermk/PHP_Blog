<?php

class RegisterController extends Controller{
	
	protected $userObject;
	
	public function index(){
		
		$this->set('task', 'add');
	
	
	}
	
	public function add(){
		
			if($this->validate_match($_POST['password1'],$_POST['password2'])){
		
			$this->userObject = new User();
			
			$password = md5(sha1($_POST['password1']));
			
			$data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],
			'password'=>$password,'user_type'=>'2');
			
	
			$result = $this->userObject->addUser($data);
			
			$this->set('message', $result);
			$this->set('task', 'add');
			}else{
				$this->set('message', 'Passwords do not match.');
				$this->set('task','add');
				$this->set('first_name',$_POST['first_name']);
				$this->set('last_name',$_POST['last_name']);
				$this->set('email',$_POST['email']);
				$this->set('error',true);
			}
			
		
	}
	
	public function validate_match($pass1,$pass2){
		
			if($pass1==$pass2){
				return true;
			}else{
				return false;
			}
	}
}
?>
