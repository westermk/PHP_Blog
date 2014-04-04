
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MVC Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo BASE_URL?>views/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

	<link href="<?php echo BASE_URL?>views/css/bootstrap-responsive.css" rel="stylesheet">
    
    	<?php if($u->isAdmin()){?>
        <link rel="stylesheet" href="<?php echo BASE_URL?>application/plugins/tinyeditor/tinyeditor.css">
        <?php }?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo BASE_URL?>">MVC Pro</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo BASE_URL?>">Home</a></li>
              <li><a href="<?php echo BASE_URL?>blog/">Blog</a></li>
              <li><a href="<?php echo BASE_URL?>weather/">Weather</a></li>        
                            
            </ul>
            
            <?php if($u->isRegistered()){?>
            <ul class="nav pull-right">
           	<li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $u->getUserName()?> 
            <b class="caret"></b>
            </a>
            
              	<ul class="dropdown-menu" role="menu">
                	<?php if($u->isAdmin()){?>
                    <li><a href="<?php echo BASE_URL?>manageposts/">Manage Posts</a></li>
                    <li><a href="<?php echo BASE_URL?>members/">Members</a></li>
					<?php }?>
                	<li><a href="<?php echo BASE_URL?>login/logout">Log Out</a></li>
                </ul>
			
            </li>  
              
              
            </ul>
            <?php }else{?>
            <ul class="nav pull-right">
            	<li><a href="<?php echo BASE_URL?>login/">Login</a></li>
           		<li><a href="<?php echo BASE_URL?>register/">Register</a></li>
            <?php }?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>