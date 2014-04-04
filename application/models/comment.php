<?php
class Comment extends Model{
	
	
	public function addComment($data){
		$sql='INSERT INTO comments (uID, commentText, date, postID) VALUES (?,?,current_timestamp,?)'; 
		$this->db->execute($sql,$data);
		$message = 'Comment added.';
		return $message;
	}
	
	public function deleteComment($data){
		$sql='DELETE FROM comments WHERE commentID = ?';	
		$this->db->execute($sql, $data);
		$message = 'Comment Deleted.';
		return $message;
	}

}

?>