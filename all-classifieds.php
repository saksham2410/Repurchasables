
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

$name = "";
$category = "";
$allads = "";
$alladsasc = "";
$alladsdesc = "";
$adtext = "";
$adtextasc = "";
$adtextdesc = "";
$adrecent="";
$alladsrecent="";

 function test_input($data)
{
	$data=trim($data);
	$data=addslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}      

if(count($_GET)>0) {
if(isset($_GET['name'])){
$name = $_GET['name']; }
if(isset($_GET['category'])){
$category = $_GET['category']; }

if(isset($_GET['sortby'])){
$sortby = $_GET['sortby'];}
$name = test_input ($name);
$category = test_input ($category);


	if (empty($category)){

		if (empty($name)){

		  $sql = "SELECT * FROM repurads";		
			$sqlascending = "SELECT * FROM repurads ORDER BY price ASC;";
		  $sqldescending = "SELECT * FROM repurads  ORDER BY price DESC;";
		  $sqlrecent = "SELECT * FROM repurads  ORDER BY id DESC;";
		  $raw_results = mysqli_query($db,$sql);
		  $results_asc = mysqli_query($db,$sqlascending);
		  $results_desc = mysqli_query($db,$sqldescending);
		  $results_recent = mysqli_query($db,$sqlrecent);
			
		}
		else {
		  $sql = "SELECT * FROM repurads WHERE title LIKE '%".$name."%'";		
			$sqlascending = "SELECT * FROM repurads WHERE title LIKE '%".$name."%' ORDER BY price ASC;";
		  $sqldescending = "SELECT * FROM repurads WHERE title LIKE '%".$name."%' ORDER BY price DESC;";
		  $sqlrecent = "SELECT * FROM repurads WHERE title LIKE '%".$name."%' ORDER BY id DESC;";
		  $raw_results = mysqli_query($db,$sql);
		  $results_asc = mysqli_query($db,$sqlascending);
		  $results_desc = mysqli_query($db,$sqldescending);
		  $results_recent = mysqli_query($db,$sqlrecent);
			
		}

	}

	else{
		if (empty($name)){

		  $sql = "SELECT * FROM repurads WHERE catagory = '$category'";		
			$raw_results = mysqli_query($db,$sql);
			$sqlascending = "SELECT * FROM repurads WHERE catagory = '$category'  ORDER BY price ASC;";
		  $sqldescending = "SELECT * FROM repurads WHERE catagory = '$category'  ORDER BY price DESC;";
		  $sqlrecent = "SELECT * FROM repurads WHERE catagory = '$category'  ORDER BY id DESC;";
		  $results_asc = mysqli_query($db,$sqlascending);
		  $results_desc = mysqli_query($db,$sqldescending);
		  $results_recent = mysqli_query($db,$sqlrecent);

		}
		else {
		  $sql = "SELECT * FROM repurads WHERE catagory = '$category' AND title LIKE '%".$name."%'";	
		  $sqlascending = "SELECT * FROM repurads WHERE catagory = '$category' AND title LIKE '%".$name."%' ORDER BY price ASC;";
		  $sqldescending = "SELECT * FROM repurads WHERE catagory = '$category' AND title LIKE '%".$name."%' ORDER BY price DESC;";
		  $sqlrecent = "SELECT * FROM repurads WHERE catagory = '$category' AND title LIKE '%".$name."%' ORDER BY id DESC;";
		  $raw_results = mysqli_query($db,$sql);
		  $results_asc = mysqli_query($db,$sqlascending);
		  $results_desc = mysqli_query($db,$sqldescending);
		  $results_recent = mysqli_query($db,$sqlrecent);
			
		}
		
	}
	
	if ($raw_results){
		$count = mysqli_num_rows($raw_results);
}
	else{
		$count = 0;
	}
	if ($count>0){

	
	
	
	
	while ($results = mysqli_fetch_array($raw_results))
	{
		$adtextrecent	=  '<a href=#>						
									<li>';
		if (!empty ( $results['file'] ) ){
			$adtextrecent .= '<img src="photos/';
			$adtextrecent .= $results['file'];
			$adtextrecent .= '" title="" alt="" />';							
		}
		else{
			$adtextrecent .= '<img src="photos/empty.jpg" title="" alt="" />';	
		}

			$adtextrecent .= '<section class="list-left">
			<h5 class="title">';
			$adtextrecent .= $results['title'];
			$adtextrecent .= '</h5>
			<h5 class="ademail">';
			$adtextrecent .= $results['name'];
			$adtextrecent .= ' ( ';
			$adtextrecent .= $results['email'];
			$adtextrecent .= ' )</h5>
			
			<span class="adprice"> Price : ';
			$adtextrecent .= $results['price'];
			$adtextrecent .= '</span>
			<p class="catpath">';
			$adtextrecent .= $results['catagory'];
			$adtextrecent .= '</p>
			</section>
			<section class="list-right">
			<span class="date">';
			$adtextrecent .= substr($results['description'], 0, 100); #;
			$adtextrecent .= '</span>
			<span class="cityname"> Phone : ';
			$adtextrecent .= $results['number']; 
			$adtextrecent .= '</span>
			</section>
			<div class="clearfix"></div>
			</li> 
		<div class="clearfix"></div>
		</a>';

			$alladsrecent .= $adtextrecent;

	}
	
	
	while ($results = mysqli_fetch_array($results_asc))
	{
		
		$adtextasc	=  '<a href=#>						
									<li>';
		if (!empty ( $results['file'] ) ){
			$adtextasc .= '<img src="photos/';
			$adtextasc .= $results['file'];
			$adtextasc .= '" title="" alt="" />';							
		}
		else{
			$adtextasc .= '<img src="photos/empty.png" title="" alt="" />';	
		}

			$adtextasc .= '<section class="list-left">
			<h5 class="title">';
			$adtextasc .= $results['title'];
			$adtextasc .= '</h5>
			<h5 class="ademail">';
			$adtextasc .= $results['name'];
			$adtextasc .= ' ( ';
			$adtextasc .= $results['email'];
			$adtextasc .= ' )</h5>
			
			<span class="adprice"> Price : ';
			$adtextasc .= $results['price'];
			$adtextasc .= '</span>
			<p class="catpath">';
			$adtextasc .= $results['catagory'];
			$adtextasc .= '</p>
			</section>
			<section class="list-right">
			<span class="date">';
			$adtextasc .= substr($results['description'], 0, 100); #;
			$adtextasc .= '</span>
			<span class="cityname"> Phone : ';
			$adtextasc .= $results['number']; 
			$adtextasc .= '</span>
			</section>
			<div class="clearfix"></div>
			</li> 
		<div class="clearfix"></div>
		</a>';

			$alladsasc .= $adtextasc;
	}
	
	
	while ($results = mysqli_fetch_array($results_desc))
	{
		
		$adtextdesc	=  '<a href=#>						
									<li>';
		if (!empty ( $results['file'] ) ){
			$adtextdesc .= '<img src="photos/';
			$adtextdesc .= $results['file'];
			$adtextdesc .= '" title="" alt="" />';							
		}
		else{
			$adtextdesc .= '<img src="photos/empty.png" title="" alt="" />';	
		}

			$adtextdesc .= '<section class="list-left">
			<h5 class="title">';
			$adtextdesc .= $results['title'];
			$adtextdesc .= '</h5>
			<h5 class="ademail">';
			$adtextdesc .= $results['name'];
			$adtextdesc .= ' ( ';
			$adtextdesc .= $results['email'];
			$adtextdesc .= ' )</h5>
			
			<span class="adprice"> Price : ';
			$adtextdesc .= $results['price'];
			$adtextdesc .= '</span>
			<p class="catpath">';
			$adtextdesc .= $results['catagory'];
			$adtextdesc .= '</p>
			</section>
			<section class="list-right">
			<span class="date">';
			$adtextdesc .= substr($results['description'], 0, 100); #;
			$adtextdesc .= '</span>
			<span class="cityname"> Phone : ';
			$adtextdesc .= $results['number']; 
			$adtextdesc .= '</span>
			</section>
			<div class="clearfix"></div>
			</li> 
		<div class="clearfix"></div>
		</a>';

			$alladsdesc .= $adtextdesc;
	}
	
	
	
}
else
{

	$allads = "No results";
	$alladsasc = "No results";
	$alladsdesc = "No results";
}
}
else{
	header("location: http://localhost/all-classifieds.php?category=&name=&submit=Search");
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
					  if ($category == "Stationary")
					  {
						  echo '<option selected value="Stationary">Stationary</option>';
					  }
					  else
					  {
						  echo '<option value="Stationary">Stationary</option>';
					  
					  
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
			

			
			<div class="ads-grid">
				
				</div>
				<div class="ads-display col-md-12">
					<div class="wrapper">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								<!--<form  method="get" action="all-classifieds.php"  id="sortform">
								<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
										<select name="sortby" onchange="this.form.submit()">
														<option value="Most recent">Most recent</option>
														<option value="Price: Rs Low to High">Price: Rs Low to High</option>
														<option value="Price: Rs High to Low">Price: Rs High to Low</option>
										</select>
									</div>
								</div>
								</form>-->
								<div class="clearfix"></div>
							<ul class="list">
								<?php
								if(count($_GET)>0) {
									if (isset($_GET['sortby'])){
										
										if($sortby=="Most recent"){
										echo "$alladsrecent";}
										else if($sortby=="Price: Rs Low to High"){
										echo "$alladsasc";}
										else if($sortby=="Price: Rs High to Low"){
										echo "$alladsdesc";}
									}
									else{
										if (empty($alladsrecent)){
										}
										echo "$alladsrecent";
										
									}
								}
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