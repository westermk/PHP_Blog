<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   		<h1> the Add Post View </h1>
  	</div>
    
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>manageposts/<?php echo $task?>" method="post" onsubmit="editor.post()">
        	<?php var_dump($task);?>
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php echo $title?>">
          <label>Date</label>
          <input type="text" class="span3" name="post_date" value="<?php echo $date;?>"> &nbsp; Format: YYYY-MM-DD HH:MM:SS<br>
          <label>Category</label>
          <select id="post_category" name="post_category">
          <?php 
		  
		  foreach($category_list as $category){
			  if ($category[1] == $category_name){
				  echo '<option value = '.$category[0].' selected="selected">'.$category[1].'</option>';
			  }
			  else{
				  echo '<option value = '.$category[0].'>'.$category[1].'</option>';
			  }
		  }
		  ?>
          </select>
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php echo $pID?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>

        
      </div>
    </div>
</div>
<?php include('views/elements/admin_footer.php');?>

