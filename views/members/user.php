
<?php include('views/elements/header.php');?>
<?php extract($user);?>
<div class="container">
	<div class="page-header">

<h1><?php echo $first_name.'\'s profile';?></h1>
	
  </div>
  
  <p>First Name: <?php echo $first_name?></p>
  <p>Last Name: <?php echo $last_name?></p>
  <p>Email: <?php echo $email;?></p>

</div>


<?php include('views/elements/footer.php');?>