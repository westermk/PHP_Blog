<?php include('views/elements/header.php');?>
<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>
	<table class="table table-hover span6">
    <thead>
    <tr>
    <th>Name</th>
    <th>Email Address</th>
    </tr>
    </thead>
	<?php foreach($members as $m){?>
    <tr>
    <td><a href="<?php echo BASE_URL?>members/user/<?php echo $m['uID'];?>"><?php echo $m['first_name'].' '.$m['last_name']?></a></td>
    <td><?php echo $m['email'];?></td>
    </tr>
<?php }?>
	</table>
</div>

<?php include('views/elements/footer.php');?>