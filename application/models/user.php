<?php
class User extends Model{
	
	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $type;
	
	public function __construct(){
		parent::__construct();
		
		if(isset($_SESSION['uID'])){
			
			$userInfo = $this->getUserFromID($_SESSION['uID']);
		
			$this->uID = $userInfo['uID'];
			$this->first_name = $userInfo['first_name'];
			$this->last_name = $userInfo['last_name'];
			$this->email = $userInfo['email'];
			$this->type = $userInfo['user_type'];			
		}
			
	}
	
	public function getUserName(){
		return $this->first_name.' '.$this->last_name;	
	}
	
	public function getUserEmail(){
		return $this->email;
	}
	
	public function isRegistered(){
		if(isset($this->type)){
			return true;
		}else{
			return false;
		}
	}
	
	public function isAdmin(){
		if($this->type == '1'){
			return true;
		}else{
			return false;
		}
	}
		
	public function getAllUsers($limit = 0){
		
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT first_name, last_name, email, uID FROM users'.$numposts;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	
	}
	
	public function addUser($data){
		
		$sql='INSERT INTO users (first_name,last_name,email,password,user_type) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
		
	}
	
	public function getUser($uID){
		
		$sql='SELECT uID, first_name, last_name, email, user_type, active FROM users WHERE uID = ?';
		$results = $this->db->getrow($sql, array($uID));
		$user = $results;
		return $user;
		
		
	}
	
	public function checkUser($email, $password){
		
		$sql = 'SELECT email, password FROM users WHERE email=?';
		
		//perform query 
		$results = $this->db->getrow($sql, array($email));
		
		if ($results['password'] == $password){
			return true;
		}else{
			return false;					
		}
	}
	
	public function getUserFromEmail($email){
		
		$sql = 'SELECT * FROM users WHERE email=?';
		
		$results = $this->db->getrow($sql, array($email));
		
		$user = $results;
		
		return $user;
			
	}
	
	public function getUserFromID($uID){
		
		$sql = 'SELECT * FROM users WHERE uID=?';
		
		$results = $this->db->getrow($sql, array($uID));
		
		$user = $results;
		
		return $user;
			
	}
}