
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

function test_input($data)
{
	$data=trim($data);
	$data=addslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}      
include('session.php');
	  $description = "";
      $title = "";
	  $email=$_SESSION['login_user'];
	  $price="";
	  $number="";
	  $catagory="";

	  $sql = "SELECT * FROM repurchasableslogin WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $name = $row["name"];

	  $descriptionerror=$catagoryerror=$numbererror=$priceerror=$titleerror="";
	 # $total = count($_FILES['upload']['name']);
	  $allowedExts = array("jpg","png","jpeg");
$upload_folder = "photos/";
if (isset($_FILES["file"]["name"])){
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
#if(1){
#if($_FILES['theFile']['name']==''){
if ($_FILES['file']['name']==''|| ((($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 100000000)//100mb
&& in_array($extension, $allowedExts)))
 
  {
	  if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["title"])){
                $titleerror = "Title is a required field";
        }
		else{
			$title = test_input($_POST['title']);
		}
		  
		  if (empty($_POST["price"])){
                $priceerror = "Price is a required field";
        }
		else{
			$price = test_input($_POST['price']);
		}
		
		  if (empty($_POST["description"])){
                $descriptionerror = "Description is a required field";
        }
		else{
			$description = test_input($_POST['description']);
			if (strlen($description)>100){
				$descriptionerror = "The length of the description should be less than 100 characters.";
			}
		}
		
		  if (empty($_POST["catagory"])){
                $catagoryerror = "Category is a required field";
        }
		else{
			$catagory = test_input($_POST['catagory']);
		}
		 
		  if (empty($_POST["number"])){
                $numbererror = "Number is a required field";
        }
		else{
			$number = test_input($_POST['number']);
			if (!preg_match("/^[0-9]*$/",$number)) {
			$phoneerror = "Only numbers allowed";}
		}		 
		
		  $stamp=time();
		  $stamp = (string) $stamp;

if($_FILES['file']['name']!=''){
	
$filename=$name."_".$title."_".$stamp."_".$_FILES["file"]["name"];
}
else
{$filename=NULL;}


if ( empty($descriptionerror) &&  empty($catagoryerror) && empty($numbererror) && empty($priceerror) && empty($titleerror)  ) {
		  $sql = "INSERT INTO repurads(name, email, catagory,description,price,title, number,file)VALUES('$name', '$email', '$catagory', '$description','$price','$title','$number','$filename')";
		  $result = mysqli_query($db,$sql);
		  if (file_exists($upload_folder . $filename))
		  {
		  //echo $filename . " already exists. ";
		  }
		else
        {
		
		  if(move_uploaded_file($_FILES["file"]["tmp_name"],$upload_folder . $filename)){
		  }
		  else {
		  	echo "File upload error";
		  	exit(0);
		  }
}
		  if (!$result){
			  $err=mysqli_error($db);
		  echo "Error $err ";
		  exit();	  
	     }
		 else{
		 # if($name != "" && $email!="" ) {
			  header("location: successfulentry.php");
         #session_register("myusername");
         #$_SESSION['login_user'] = $myusername;
         
         #header("location: index.php");
		 #}
		 }
}
	  }
	      
	 
  }
	else
  {
  echo "Invalid file. Only jpg,png or jpeg allowed with size < 100 MB.";  
  }  
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
			<h2 class="head">Post an Ad</h2>
			<div class="post-ad-form">
				<form action = "" method = "post" enctype="multipart/form-data">
					<div class="error_login" id="makeright"><?php echo $catagoryerror;?></div>
					<label>Select Category <span>*</span></label>
					<select class="" name="catagory">
					  <option>Mobiles</option>
					  <option>Electronics and Appliances</option>
					  <option>Furniture</option>
					  <option>Books</option>
					  <option>Fashion</option>
					  <option>Sports</option>
					  <option>Other</option>
					</select>
					<div class="clearfix"></div>
					<div class="error_login" id="makeright"><?php echo $titleerror;?></div>
					<label>Ad Title <span>*</span></label>
					<input type="text" name="title" class="phone" placeholder="">
					<div class="clearfix"></div>
					<div class="error_login" id="makeright"><?php echo $priceerror;?></div>
					<label>Price <span>*</span></label>
					<input type="text" name="price" class="phone" placeholder="">
					<div class="clearfix"></div>
					<div class="error_login" id="makeright"><?php echo $descriptionerror;?></div>
					<label>Ad Description <span>*</span></label>
					<textarea class="mess" name="description" placeholder="Write few lines about your product"></textarea>
					<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label>Photos for your ad :</label>	
					<div class="photos-upload-view">
						
						

						<div>
							<input type="file" id="file" name="file"  />
							<!--<input type="submit" value="Upload Image" name="submit">-->
							<!--<div id="filedrag">or drop files here</div>-->
						</div>

						

						<!--</form>-->


						</div>
					<div class="clearfix"></div>
						<script src="js/filedrag.js"></script>
				</div>
					<div class="personal-details">
					
						
						<div class="error_login" id="makeright"><?php echo $numbererror;?></div>
						<label>Your Mobile No <span>*</span></label>
						<input type="text" name="number" class="phone" placeholder="">
						<div class="clearfix"></div>
											<input type="submit" name="submit" value="Post">					
					<div class="clearfix"></div>
					
					</div>
					</form>
			</div>
		</div>	
	</div>
	<!-- // Submit Ad -->
	<!--footer section start-->
<footer>
	
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
