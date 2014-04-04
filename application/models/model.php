<?php
include_once('application/libraries/adodb5/adodb.inc.php');
class Model {



	protected $db;
	
	public function __construct(){
		
		try{
			
			//PDO
			//$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER, DB_PASS);
			
			
			//ADOdb
			$this->db = NewADOConnection('mysql');
			$this->db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
		
		} catch (exception $e){
			
			echo 'Connection failed: ' . $e->getMessage();
			
		}
		
	}
  
}
