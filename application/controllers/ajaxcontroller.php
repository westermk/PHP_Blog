<?php

class AjaxController extends Controller{
	protected $postObject;
	protected $userObject;
	protected $categoryObject;
	
	public function index(){
		$this->set('response', 'invalid request!');	
	}
	
	public function get_post_content(){
		$this->postObject = new Post();
		$post = $this->postObject->getPost($_GET['pID']);
		$this->set('response', $post['content']);
	}
}

?>