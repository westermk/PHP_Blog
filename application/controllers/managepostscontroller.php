<?php

class ManagePostsController extends Controller{
	
	public $postObject;
	public $categoriesObject;
	
	protected $access = 1;
	
	public function getTime(){
		
		$ct = new DateTime();
		$tz = new DateTimeZone('America/Indianapolis');
		$ct->setTimeZone($tz);
		
		return $ct->format('Y-m-d H:i:s');
	}
	
	public function index(){
	
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Manage Post View');
		$this->set('posts',$posts);
	}
	
	public function add(){
		
		$this->postObject = new Post();
		$this->categoriesObject = new Categories();
		$category_list = $this->categoriesObject->getCategories();
		$this->set('task', 'save');
		$this->set('date', $this->getTime());
		$this->set('category_list', $category_list);
	
	
	}
	
	public function save(){
		
			$this->postObject = new Post();
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],
						'date'=>$_POST['post_date'],'category'=>$_POST['post_category'],'uID'=>'2');
			
	
			$result = $this->postObject->addPost($data);
			
			$this->set('message', $result);
			
		
	}
	
	public function edit($pID){
		
			$this->postObject = new Post();
			$post = $this->postObject->getPost($pID);
			
			
			$this->categoriesObject = new Categories();
			$category_list = $this->categoriesObject->getCategories();
			
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
			$this->set('task', 'update');
			$this->set('date', $post['date']);
	 		$this->set('category_list', $category_list);
			$this->set('category_name', $post['name']);
			
		
	}
	
	public function update(){
			$this->postObject = new Post();
			
			$this->set('task', 'add');
			
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'date'=>$_POST['post_date'],'category'=>$_POST['post_category'],'pID'=>$_POST['pID']);
			
	
			$result = $this->postObject->updatePost($data);
			
			$this->set('message', $result);
	}
	
	public function delete(){
	
		$this->postObject = new Post();
		$result = $this->postObject->deletePost();
		$this->set('message', $result);		
	}
	
}
