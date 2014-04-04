<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
	  	<h1><?php echo $title;?></h1>
  	</div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
      	<a href="<?php echo BASE_URL?>manageposts/add" class="btn btn-primary">New Posts</a>
      </div>    
  </div>
  <div>
  
		<?php foreach($posts as $p){?>
            <h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>">
            <?php echo $p['title'];?></a></h3> 
	        <h5><?php echo date('F jS\, Y',strtotime($p['date'])).' by '.$p['first_name'].' '.$p['last_name'].' in '.$p['name']; ?></h5>
            <?php //echo $p['pID'];?>
            <h3>(<a href="<?php echo BASE_URL;?>manageposts/edit/<?php echo $p['pID'];?>">Edit</a>)
	            (<a href="<?php echo BASE_URL;?>manageposts/delete/<?php echo $p['pID'];?>">Delete</a>)
            	(<a href="<?php echo BASE_URL;?>blog/post/<?php echo $p['pID'];?>">View</a>)
            </h3>
            <hr />
        <?php }?>
  </div>
</div>
<?php include('views/elements/admin_footer.php');?>

