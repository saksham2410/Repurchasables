
<!DOCTYPE html>
<html>
<head>
<title>Change password</title>
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
</head>
<body>

<?php
function hash_equals($str1, $str2)
    {
        if(strlen($str1) != strlen($str2))
        {
            return false;
        }
        else
        {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }

    include('session.php');
	 $email = "";
      $password = "";
		$newpassword = "";
	  $newpasswordconfirm="";
	$newpasswordconfirmerror  = $newpassworderror = $passworderror ="";
  

	  if($_SERVER["REQUEST_METHOD"] == "POST") {
       

       $email=$_SESSION['login_user'];

		
        if (empty($_POST["password"])){
                $passworderror = "Password is a required field";
        }
        else {
                $password = test_input($_POST['password']);
				$sql = "SELECT * FROM repurchasableslogin WHERE email = '$email'";
				$result = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$oldpassword = $row["password"];
				$ans=crypt($password, $oldpassword);
				if(!hash_equals($oldpassword, $ans))
				{
					$passworderror="Incorrect password";
				}

           
        }

		if (empty($_POST["newpassword"])){
                $newpassworderror = "New Password is a required field";
        }
        else {
                $newpassword = test_input($_POST['newpassword']);

				$cuppercase = preg_match('@[A-Z]@', $newpassword);
				$clowercase = preg_match('@[a-z]@', $newpassword);
				$cnumber    = preg_match('@[0-9]@', $newpassword);

            if (!$cuppercase || !$clowercase || !$cnumber || strlen($newpassword) < 8) {
                $passworderror = "Password must : be minimum of 8 characters, contain at least 1 number, one uppercase character
and one lowercase character";
        }
        }

		if (empty($_POST["newpasswordconfirm"])){
                $newpassworderror = "Password is a required field";
        }
        else {
                $newpasswordconfirm = test_input($_POST['newpasswordconfirm']);
				
				if ($newpassword != $newpasswordconfirm){
					$newpasswordconfirmerror = "The passwords do not match, please enter again.";
				}
		
        }


		if(empty($passworderror)  && empty($newpassworderror) && empty($newpasswordconfirmerror))
		{
			$hash = crypt($newpassword);
			$sql = "UPDATE repurchasableslogin SET password = '$hash' WHERE email = '$email'";

			$result = mysqli_query($db,$sql);
			if (!$result){
		  printf("Error %s \n", mysqli_error($db));
		  exit();
		  
	      }
		  else{
			 // echo"Password Successfully changed.";
			   header("location: passwordchanged.php");
		  }
		}
      
   }
	  function test_input($data)
{
	$data=trim($data);
	$data=addslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}      



?>



<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Re</span>Purchasables</a>
			</div>
			<div class="header-right">
			
	<!-- Large modal -->
			</div>
		</div>
				<script>
				$('#myModal').modal('');
				</script>
			</div>
		</div>
		</div>
	</div>
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Change Password</h1>
						
						<br>
						<br>
						<form action = "" method = "post">
						<div class="error_login"><?php echo $passworderror;?></div>								

							<div class="sign-u">
							<div class="sign-up1">
								<h4>Old Password* :</h4>
							</div>
							<div class="sign-up2">
									<input type="password" name="password"  required=" "/>
								
							</div>

							<div class="clearfix"> </div>
					        								
							</div>
						<div class="error_login"><?php echo $newpassworderror;?></div>								

							<div class="sign-u">
							<div class="sign-up1">
								<h4>New Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="newpassword"  required=" "/>
								
							</div>

							<div class="clearfix"> </div>
						<div class="error_login"><?php echo $newpasswordconfirmerror;?></div>								

							</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password*:</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="newpasswordconfirm"  required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								
									<input type="submit" value="Change">
								
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="index.php">Home</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						</form>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">© 2017 RePurchasables. All Rights Reserved</a></p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>


