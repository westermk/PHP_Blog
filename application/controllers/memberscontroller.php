<?php

class MembersController extends Controller{
	
	public $memberObject;
   
   	public function user($uID){
	   
		$this->memberObject = new User();
		$member = $this->memberObject->getUser($uID);	    
	  	$this->set('member',$member);
	   
   	}
	
	public function index(){
		
		$this->memberObject = new User();
		$members = $this->memberObject->getAllUsers();
		$this->set('title', 'Member Listing');
		$this->set('members',$members);
	
	}
	
	
}
