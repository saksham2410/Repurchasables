
<!DOCTYPE html>
<html>
<head>
<title>Post an Ad</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link href="css/jquery.uls.css" rel="stylesheet"/>
<link href="css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="js/jquery.uls.data.js"></script>
<script src="js/jquery.uls.data.utils.js"></script>
<script src="js/jquery.uls.lcd.js"></script>
<script src="js/jquery.uls.languagefilter.js"></script>
<script src="js/jquery.uls.regionfilter.js"></script>
<script src="js/jquery.uls.core.js"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
		<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
    <script src="js/easyResponsiveTabs.js"></script>
</head>
<body>


<?php

include('session.php');

$message ="Ad not deleted";

if(count($_GET)>0) {

$name = $_GET['name']; 
$email = $_GET['email']; 
$title = $_GET['title']; 
$category = $_GET['catagory']; 
$xfile = $_GET['file'];
  
		  $sql = "DELETE FROM repurads WHERE name='$name' AND email='$email' AND title='$title' AND catagory='$category'";		
			$result = mysqli_query($db,$sql);

			if ($result){
				$message = "Ad deleted succesfully";
			}
			
$file = "photos/";
$file .= $xfile;

unlink($file);

}

?>


<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Re</span>Purchasables</a>
			</div>
			<div class="header-right">
			<br>
			<a class="account" href="myaccount.php">My Account</a>
		</div>
		</div>
	</div>
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head"><center> <?php echo "$message" ?> </center></h2>
			
			
	<br>
			<!--<button class="account" onclick="window.location.href='index.php'">continue</button> -->
			<div style="margin: 0 auto; text-align: center;">
			<a class="account1" href="index.php">Continue</a>
			<br><br>
			</div>
			
		</div>	
	</div>
	<!-- // Submit Ad -->
	<!--footer section start-->
<footer>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<div class="footer-bottom text-center">
		<div class="container">
			<div class="footer-logo">
				<a href="index.php"><span>Re</span>Purchasables</a>
			</div>
			
			<div class="copyrights">
				<p> © 2017 RePurchasables. All Rights Reserved</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</footer>
        <!--footer section end-->
</body>
</html>