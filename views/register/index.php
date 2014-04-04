<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
   <h1> Register </h1>
  </div>
  
  <?php if($message){?>
    <div class="alert alert-<?php if($error){echo 'error';}else{echo 'success';}?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>register/<?php echo $task?>" method="post">
          <label>First Name</label>
          <input type="text" class="span3" name="first_name" required value="<?php echo $first_name;?>">
          <label>Last Name</label>
          <input type="text" class="span3" name="last_name" require value="<?php echo $last_name;?>">
          <label>Email</label>
          <input type="email" class="span3" name="email" required value="<?php echo $email;?>">
          <label>Password</label>
          <input type="password" class="span3" name="password1" required value="<?php echo $password;?>">
          <label>Confirm Password</label>
          <input type="password" class="span3" name="password2" required value="<?php echo $password;?>">
          <br><br>
          <button id="submit" type="submit" class="btn btn-primary" >Register</button>
        </form>

      </div>
    </div>
  
</div>
<?php include('views/elements/footer.php');?>

