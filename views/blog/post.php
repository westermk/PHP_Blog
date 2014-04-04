<?php include('views/elements/header.php');?>
<?php extract($post);?>
<?php $postID = $pID;?>
<div class="container">
	<div class="page-header">
    </div>
    
    <?php if($message){?>
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $message?>
        </div>
	<?php }?>
	
    <div>
	<h1><?php echo $title;?> (<a href="<?php echo BASE_URL;?>manageposts/edit/<?php echo $pID;?>">Edit</a>)</h1>
	<p><?php echo $content;?></p>
    <input type="hidden" value="<?php echo $uID;?>" />
 
    <p>Category: <?php echo $name;?></p>

 	<p><?php echo date('F jS\, Y',strtotime($date));?></p>
    </div>

    <?php if($u->isRegistered()){?>
    <div class="comments">
    <h2>Add Comment</h2><br />
    
    <form action="<?php echo BASE_URL?>blog/saveComment" method="post" onsubmit="editor.post()">
        <input type="hidden" name="comment_postID" value="<?php echo $postID?>"/>
        <input type="hidden" name="comment_uID" value="<?php echo $uID?>"/>
    	<textarea name="comment_commentText" style="width:556px;height: 200px"></textarea>
        <button class="btn btn-primary" type="submit"><strong>Comment</strong></button>
    </form>
	</div>
	<?php }else{?>
	    <a class="btn btn-primary" href="<?php echo BASE_URL?>login"><strong>Login</strong></a>
    <?php }?>
    
    <div class="comments">
    <h2>Comments</h2>
    <?php if(isset($comments)){?>
    
		<?php if($u->isAdmin()){?>
            <?php foreach($comments as $c){?>
                <h4><strong><?php echo $c['first_name'].' '.$c['last_name'];?></strong></h4>
                <?php echo $c['commentText'];?><br />
                <?php echo date('F jS\, Y',strtotime($c['date']));?> <br />            
                <form action="<?php echo BASE_URL?>blog/delete" method="post" onsubmit="editor.post()">
                  	<input type="hidden" name="comment_commentID" value="<?php echo $c['commentID'];?>"/>
                    <button class="btn btn-primary" type="submit" name="commentDelete"><strong>Delete</strong></button>
                </form>
                <hr />
            <?php }?>
        <?php }else{?>
            <?php foreach($comments as $c){?>
                <h4><strong><?php echo $c['first_name'].' '.$c['last_name'];?></strong></h4>
                <?php echo $c['commentText'];?><br />
                <?php echo date('F jS\, Y',strtotime($c['date']));?> <br />
            <?php }?>
                <hr />
        <?php }?>    

    <?php }else{?>
    	<p>There has been 0 comments posted for this post</p>
    <?php }?>
    
    </div>    
</div>

<?php include('views/elements/footer.php');?>