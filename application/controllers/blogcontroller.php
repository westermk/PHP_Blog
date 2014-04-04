<?php

class BlogController extends Controller{
	
	public $postObject;
	public $commentObject;
	public $addCommentObject;
	public $deleteCommentObject;
   
   	public function post($pID){
	   
		$this->postObject = new Post();
		$this->commentObject = new Post();
		$post = $this->postObject->getPost($pID);	
		$comments = $this->commentObject->getComments($pID);
	  	$this->set('post',$post);
		$this->set('comments',$comments);
	   
   	}
	
	public function index(){
		
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);

	
	}
	
	public function saveComment(){
		$this->addCommentObject = new Comment();		
		$data = array('uID'=>$_POST['comment_uID'], 'commentText'=>$_POST['comment_commentText'],
		'postID'=>$_POST['comment_postID']);		
		$result = $this->addCommentObject->addComment($data);
		$this->set('message', $result);	
		header('Location: ' . BASE_URL . 'blog/post/' . $_POST['comment_postID']);
	}
	
	public function delete(){
		$this->deleteCommentObject = new Comment();
		$data = array('commentID'=>$_POST['comment_commentID'], 'uID'=>$_POST['comment_uID'], 
		'commentText'=>$_POST['comment_commentText'], 'postID'=>$_POST['comment_postID']);		
		$result = $this->deleteCommentObject->deleteComment($data);
		$this->set('message', $result);	
		header('Location: ' . BASE_URL . 'blog/post/' . $_POST['comment_postID']);
		
	}
}
