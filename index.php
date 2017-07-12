
<!DOCTYPE html>
<html>
<head>
<title>RePurchasables</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
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
</head>
<body>

<?php
	include('session.php');
?>



	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Re</span>Purchasables</a>
			</div>
			<div class="header-right">
				
				<a class="account" href="myaccount.php">My Account</a>
				<button class="btn btn-primary" onclick="window.location.href='https://docs.google.com/a/iitrpr.ac.in/forms/d/1Vp4cvTXSLQS5TVRNnh005bxl0BOeuZ7ff9Ni8_8Elx0/edit?usp=sharing'">Feedback</button>
				<button class="btn btn-primary" onclick="window.location.href='project_website'">About Us</button>
				<button class="btn btn-primary" onclick="window.location.href='post-ad.php'">Post Ad</button>
				<button class="btn btn-primary" onclick="window.location.href='logout.php'">Log Out</button>
			</div>

		</div>
	</div>
	<!--<div class="main-banner banner text-center">-->
	  <!--<div class="container">    -->
			<!--<h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with Resale</h1>-->
			<!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>-->

	  <!--</div>-->
	<!--</div>-->
    	<!-- content-starts-here -->
		<div class="content">
			<div class="categories">
				<div class="container">
				
				<form  method="get" action="all-classifieds.php"  id="searchform"> 				
				<div class="select-box">
				<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select class="selectpicker show-tick" data-live-search="true" name="category" id="category">
					  <?php
					  if ($category == "")
					  {
						  echo '<option selected value="">All</option>';
					  }
					  else
					  {
						  echo '<option value="">All</option>';
					  }
					  if ($category == "Mobiles")
					  {
						  echo '<option selected value="Mobiles">Mobiles</option>';
					  }
					  else
					  {
						  echo '<option value="Mobiles">Mobiles</option>';
					  }
					  if ($category == "Electronics and Appliances")
					  {
						  echo '<option selected value="Electronics and Appliances">Electronics and Appliances</option>';
					  }
					  else
					  {
						  echo '<option value="Electronics and Appliances">Electronics and Appliances</option>';
					  }
					  if ($category == "Furniture")
					  {
						  echo '<option selected value="Furniture">Furniture</option>';
					  }
					  else
					  {
						  echo '<option value="Furniture">Furniture</option>';
					  }
					  if ($category == "Books")
					  {
						  echo '<option selected value="Books">Books</option>';
					  }
					  else
					  {
						  echo '<option value="Books">Books</option>';
					  }
					  if ($category == "Fashion")
					  {
						  echo '<option selected value="Fashion">Fashion</option>';
					  }
					  else
					  {
						  echo '<option value="Fashion">Fashion</option>';
					  }
					  if ($category == "Sports")
					  {
						  echo '<option selected value="Sports">Sports</option>';
					  }
					  else
					  {
						  echo '<option value="Sports">Sports</option>';
					  }
					  if ($category == "Other")
					  {
						  echo '<option selected value="Other">Other</option>';
					  }
					  else
					  {
						  echo '<option value="Other">Other</option>';
					  }
					  
					  
					  ?>
					</select>
				</div>
				
					<div class="search-product ads-list">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control input-lg" placeholder="Search" type="text" name="name"/>
							</div>
							</div>
						
							</div>
					</div>
					
					<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
										<select name="sortby" data-live-search="true" id="sortby">
										
										<?php
										
										  if ($sortby == "")
										  {
											  echo '<option selected value="Most recent">Most recent</option>';
										  }
										  else
										  {
											  echo '<option value="Most recent">Most recent</option>';
										  }
										  if ($sortby == "Price: Rs Low to High")
										  {
											  echo '<option selected value="Price: Rs Low to High">Price: Rs Low to High</option>';
										  }
										  else
										  {
											  echo '<option value="Price: Rs Low to High">Price: Rs Low to High</option>';
										  }
										  if ($sortby == "Price: Rs High to Low")
										  {
											  echo '<option selected value="Price: Rs High to Low">Price: Rs High to Low</option>';
										  }
										  else
										  {
											  echo '<option value="Price: Rs High to Low">Price: Rs High to Low</option>';
										  }
											
											?>
										</select>
									</div>
								</div>
					
			<input class="searchbutton" type="submit" name="submit" value="Search">

			<div class="clearfix"></div>
			</div>
				</form> 
				
				
			<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=Mobiles&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-mobile"></i></div>
									<h4 class="clrchg">Mobiles</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=Electronics+and+Appliances&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-laptop"></i></div>
									<h4 class="clrchg"> Electronics & Appliances</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=Furniture&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-bed"></i></div>
									<h4 class="clrchg">Furnitures</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=Books&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-book"></i></div>
									<h4 class="clrchg">Books</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=Fashion&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-female"></i></div>
									<h4 class="clrchg">Fashion</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 focus-grid">
						<a href="http://localhost/all-classifieds.php?category=Sports&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-gamepad"></i></div>
									<h4 class="clrchg">Sports</h4>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-md-3 focus-grid">
                        <a href="all-classifieds.php?category=Other&name=&submit=Search">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-battery-2"></i></div>
                                    <h4 class="clrchg">Other</h4>
                                </div>
                            </div>
                        </a>
                    </div>
					<div class="col-md-3 focus-grid">
						<a href="all-classifieds.php?category=&name=&submit=Search">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-table"></i></div>
									<h4 class="clrchg">All Ads</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
        </div>

		<!--footer section start-->		
		<footer>
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
