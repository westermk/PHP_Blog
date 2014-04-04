<?php
class Post extends Model{
	
	function getPost($pID){
		
		$sql =  'SELECT pID, title, content, date, first_name, last_name, name, posts.uID 
				FROM posts INNER JOIN users ON posts.uID=users.uID 
				INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE pID = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($pID));
		
		$post = $results;
	
		return $post;
	
	}
		
	public function getAllPosts($limit = 0){
		
		if($limit > 0){
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT pID, title, content, date, first_name, last_name, name 
		FROM posts INNER JOIN users ON posts.uID=users.uID 
		INNER JOIN categories ON posts.categoryID=categories.categoryID'.$numposts;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

		return $posts;
	
	}
	
	public function addPost($data){
		
		$sql='INSERT INTO posts (title,content,date,categoryID,uID) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'Post added.';
		return $message;
		
	}
	
	public function updatePost($data){
		
		$sql='UPDATE posts SET title=?, content=?, date=?, categoryID=? WHERE pID=?'; 
		$this->db->execute($sql,$data);
		$message = 'Post updated.';
		return $message;
		
	}
	
	public function getComments($pID){
		$SQL="SELECT commentID, first_name, last_name, commentText, comments.date, postID, pID 
				FROM users INNER JOIN posts ON users.uID = posts.uID 
				INNER JOIN comments ON posts.pID = comments.postID
				WHERE postID=?
				ORDER BY date DESC";
					
		// perform query
		$results = $this->db->execute($SQL, $pID);
		
		while ($row=$results->fetchrow()) {
			$comments[] = $row;
		}
		return $comments;
	}
	
	public function deletePost(){
		
		$sql='DELETE FROM posts WHERE pID=?';
		$this->db->execute($sql);
		$message = 'Post Deleted.';
		return $message;
			
	}
}