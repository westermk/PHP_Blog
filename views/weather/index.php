<?php include('views/elements/header.php');?>

<?php if($result){?>
<div class="container">
	<div class="page-header">
    <h1> Weather View </h1>
    <?php echo $weather->City; ?>
	<?php echo $weather->State; ?>
    
    <h4>Todays High: <?php echo $weather->ForecastResult->Forecast->Temperatures->DaytimeHigh?></h4>
    <h4>Todays High: <?php echo $weather->ForecastResult->Forecast->Temperatures->MorningLow?></h4>
    
  </div>
</div>
<?php }else{?>
<div class="container">
	<div class="page-header">
    <h1> Weather View </h1>

    <h4>Enter your zip code below</h4>
        <div>
            <form method="post" action="<?php echo BASE_URL?>weather/getResults/">
                <label>Enter your zip code: </label>
                <input class="span3" type="text" name="ZIP" value="" />
                <br />
                <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
	</div>
</div>
<? }?>
<?php include('views/elements/footer.php');?>
