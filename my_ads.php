
<!DOCTYPE html>
<html>
<head>
<title>All Classifieds</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
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
    <script src="js/tabs.js"></script>
	
<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>
</head>
<body>
<?php

include('session.php');

$allads = "";
$adtext = "";

 function test_input($data)
{
	$data=trim($data);
	$data=addslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}      


$email=$_SESSION['login_user'];

$sql = "SELECT * FROM repurads WHERE email = '$email' ";		
$raw_results = mysqli_query($db,$sql);

	
	if ($raw_results){
		$count = mysqli_num_rows($raw_results);
	}
	else{
		$count = 0;
	}
	if ($count>0){

	while ($results = mysqli_fetch_array($raw_results))
	{
		
		$adtext	=  '<a href=#>						
									<li>';
		if (!empty ( $results['file'] ) ){
			$adtext .= '<img src="photos/';
			$adtext .= $results['file'];
			$adtext .= '" title="" alt="" />';							
		}
		else{
			$adtext .= '<img src="photos/empty.png" title="" alt="" />';	
		}

//			$adtext .=	'<form  method="get" action="delete.php?';
//			$adtext .= $actiontext;
	//		$adtext .= '&" id="searchform"> 				
//			<input class="searchbutton" type="submit" name="submit" value="Delete">
//				</form> 

			$adtext .= '<section class="list-left">
			<h5 class="title">';
			$adtext .= $results['title'];
			$adtext .= '</h5>
			<h5 class="ademail">';
			$adtext .= $results['name'];
			$adtext .= ' ( ';
			$adtext .= $results['email'];
			$adtext .= ' )</h5>
			
			<span class="adprice"> Price : ';
			$adtext .= $results['price'];
			$adtext .= '</span>
			<p class="catpath">';
			$adtext .= $results['catagory'];
			$adtext .= '</p>
			</section>
			<section class="list-right">
			<a class="account" href="';
			$linktext = 'delete.php?name='.$results['name'].'&email='.$results['email'].'&title='.$results['title'].'&catagory='.$results['catagory'].'&file='.$results['file'];
			
			$adtext .=	$linktext;
			$adtext .= '">Delete</a>
			</section>
			<div class="clearfix"></div>
			</li> 
		<div class="clearfix"></div>
		</a>';

			$allads .= $adtext;
	}
}

else
{

	$allads = "No results";
}


?>


<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Re</span>Purchasables</a>
			</div>
			<div class="header-right">
			<a class="account" href="myaccount.php">My Account</a>
				<button class="btn btn-primary" onclick="window.location.href='post-ad.php'">Post Ad</button>
	<!-- Large modal -->
			</div>
		</div>
	</div>
	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">
				

			
			<div class="ads-grid">
				
				</div>
				<div class="ads-display col-md-12">
					<div class="wrapper">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								
								<div class="clearfix"></div>
							<ul class="list">
								<?php
									echo "$allads";
								?>
							</ul>
						</div>
							</div>
						</div>
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->

	
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


