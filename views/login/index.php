<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
   		<h1>Login</h1>
    </div>
    
    <?php if($error){?>
    	<div class="alert alert-danger">
        <?php echo $error?>
        </div>
		<?php } ?>
        
   	<form action="<?php echo BASE_URL?>login/do_login" method="post">
          <label>Email</label>
          <input type="email" class="span3" name="email" value="<?php echo $email;?>">
          <label>Password</label>
          <input type="password" class="span3" name="password1" value="<?php echo $password;?>">
          <br><br>
          <button id="submit" type="submit" class="btn btn-primary" >Log In</button>
        </form>

</div>
<?php include('views/elements/footer.php');?>

