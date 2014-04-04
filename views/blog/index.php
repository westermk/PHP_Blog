
<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
		<h1><?php echo $title;?></h1>
  	
		<?php foreach($posts as $p){?>
        <h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>">
        <?php echo $p['title'];?></a> (<a href="<?php echo BASE_URL;?>manageposts/edit/<?php echo $p['pID'];?>">Edit</a>)</h3>
        <h5><?php echo date('F jS\, Y',strtotime($p['date'])).' by '.$p['first_name'].' '.$p['last_name'].' in '.$p['name']; ?></h5>
        
        
            <div>
            <a href="<?php echo BASE_URL?>ajax/get_post_content/?pID=<?php echo $p['pID'];?>" class="btn post-loader" >View Post</a>
            </div>
        <?php }?>
    </div>
</div>

<?php include('views/elements/footer.php');?>