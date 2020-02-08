<?php 
require 'php/config.php'; ?>
<!DOCTYPE html>

<html>
  <head>
    <title>Suncokret</title>
    <link rel="icon" href="data0/images/icon2.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
  <style>
.jumbotron {
  background-image: linear-gradient(to top,rgb(226, 224, 71) 0%,rgb(223, 161, 90) 100%);
}
</style>
	

</head>

  <body id="main_body">
  <?php
  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
      ?>
       <div class="login">
      <h2 style='color: #fff';>Dobrodošli <?php echo $_SESSION['username'] ?> !</h2>
    </div>
    <br>  
<?php
}
else{
        ?>
    <div class="login">
      <h3 style="color:black;"><a style="color:black;" href="Ulaz/index.php">Log in <span class="glyphicon glyphicon-log-in"></span></a></h3>
    </div>
    <br>
    <?php

	
	 
}
?>
	
	 <div class="home">
     <div class="jumbotron">
  <h1 class="display-4 first-caption">Dobrodošli!</h1>
  <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container0">
	<div class="ws_images"><ul>
		
    <li><img src="data0/images/9.jpg" alt="" title="" id="wows0_1"/></li>
		<li><img src="data0/images/10.jpg" alt="" title="" id="wows0_2"/></li>
		<li><img src="data0/images/11.jpg" alt="" title="" id="wows0_3"/></li>
		<li><img src="data0/images/12.jpg" alt="" title="" id="wows0_4"/></li>
		<li><img src="data0/images/13.jpeg" alt="" title="" id="wows0_5"/></li>
		<li><a href="http://wowslider.net"><img src="data0/images/14.jpg" alt="jquery slider" title="" id="wows0_6"/></a></li>
		<li><img src="data0/images/16.jpg" alt="" title="" id="wows0_7"/></li>
	</ul></div>
	<!-- <div class="ws_thumbs">
    <div>
		
    <a href="#" title=""><img src="data0/tooltips/9.jpg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/10.jpg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/11.jpg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/12.jpg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/13.jpeg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/14.jpg" alt="" /></a>
		<a href="#" title=""><img src="data0/tooltips/16.jpg" alt="" /></a>
	</div>
</div> -->
<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">bootstrap carousel</a> by WOWSlider.com v8.7</div>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine0/wowslider.js"></script>
	<script type="text/javascript" src="engine0/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
  <p align="center">Prijavite se ili nastavite na početnu</p>
  <h1 style="color:black;"><a style="color:black;" href="index2.php">Početna </a></h1>
</div>
    
  </div>
<?php
  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  	if($_SESSION['status']=='Admin'){
      ?>
      <div class="home">
    <h1><a class="my-a" href="index3.php">Admin panel <span class="glyphicon glyphicon-wrench"></span></a></h1>
  </div>
  	
       
<?php
}
}

?>
  



  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </body>
</html>
