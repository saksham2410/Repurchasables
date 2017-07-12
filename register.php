
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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

    include('config.php');
	
	session_start();
   
   if(session_destroy()) {
   }
	else {
	    header("Location: index.php");
	}
   session_start();
   
	$myusername = "";
      $mypassword = "";
		$mypasswordconfirm = "";
	  $number=0;
	  $name="";
	$nameerror = $emailerror = $phoneerror = $passworderror ="";
  

	  if($_SERVER["REQUEST_METHOD"] == "POST") {
       if (empty($_POST["name"])){
                $nameerror = "Name is a required field";
        }
        else {
                $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameerror = "Only letters and white space allowed";
        }
        }

        if (empty($_POST["email"])){
                $emailerror = "Email address is a required field";
        }
        else {
                $myusername = test_input($_POST['email']);
        if(!filter_var($myusername, FILTER_VALIDATE_EMAIL)) {
			
                $emailerror = "Not a valid email address";
        }
        }
		
		
        if (empty($_POST["number"])){
                $phoneerror = "Number is a required field";
        }
        else {
                $number = test_input($_POST['number']);

            if (!preg_match("/^[0-9]*$/",$number)) {
                $phoneerror = "Only numbers allowed";
        }
        }

		if (empty($_POST["password"])){
                $passworderror = "Password is a required field";
        }
        else {
                $mypassword = test_input($_POST['password']);

				$cuppercase = preg_match('@[A-Z]@', $mypassword);
				$clowercase = preg_match('@[a-z]@', $mypassword);
				$cnumber    = preg_match('@[0-9]@', $mypassword);

            if (!$cuppercase || !$clowercase || !$cnumber || strlen($mypassword) < 8) {
                $passworderror = "Password must : be minimum of 8 characters, contain at least 1 number, one uppercase character
and one lowercase character";
        }
        }

		if (empty($_POST["passwordconfirm"])){
                $passworderror = "Password is a required field";
        }
        else {
                $mypasswordconfirm = test_input($_POST['passwordconfirm']);
				if ($mypassword != $mypasswordconfirm){
					$passworderror = "The passwords do not match, please enter again.";
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


if (empty($nameerror) && empty($emailerror) &&  empty($phoneerror) && empty($passworderror)  ) {
	if($number !=0){
			$hash = crypt($mypassword);
			//echo "$hash";
			//echo "<br>";
      $sql = "INSERT INTO repurchasableslogin(name, email, password, number)VALUES('$name', '$myusername', '$hash', '$number')";

		$result = mysqli_query($db,$sql);
	  if (!$result){
		  printf("Error %s \n", mysqli_error($db));
		  exit();
		  
	  }
      #$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      #$active = $row['active'];
      
      #$count = mysqli_num_rows($result);

/*
echo "$myusername $name $mypassword $hash";
$to      = $myusername; // Send email to our user
$subject = 'Repurchasables | Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$mypassword.'
------------------------
 
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$myusername.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:repurchasables@gmail.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
*/

/*
echo "Reached here";

// include the phpmailer class file
require_once "phpmailer/class.phpmailer.php";


//echo "db = $db ";
echo "Reached here 1";
//echo "db = $db ";
// my message to send to the user
$lastID = mysql_insert_id();;

echo "$lastID";

echo "Reached here 342";
$message = '<html><head>
           <title>Email Verification</title>
           </head>
           <body>';
$message .= '<h1>Hi ' . $name . '!</h1>';
echo "Reached here";
$message .= '<p><a href="'.'10.1.1.19/~2015csb1032/'.'activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
$message .= "</body></html>";

echo "Reached here 2";
// php mailer code starts
$mail = new PHPMailer(true);
// telling the class to use SMTP
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;   
echo "Reached here 3";
// sets the prefix to the server
$mail->SMTPSecure = "ssl"; 
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com"; 
echo "Reached here 4";
// set the SMTP port for the GMAIL server
$mail->Port = 465; 

// set your username here
echo "Reached here 5";
$mail->Username = 'repurchasables@gmail.com';
$mail->Password = 'vin290313188';

// set your subject
echo "Reached here 6";
$mail->Subject = trim("Email Verifcation - Repurchasables");

// sending mail from
echo "Reached here 7";
$mail->SetFrom('repurchasables@gmail.com', 'Repurchasables');
// sending to
echo "Reached here 8";
echo "Email $myusername";
$mail->AddAddress($myusername);
// set the message
$mail->MsgHTML($message);
echo "Reached here 9";

echo "Reached here 10";
try {
echo "Reached here 11";
  $mail->send();
  echo "Sent mail";
} catch (Exception $ex) {
  echo "Error in sending verification mail.";
  echo $msg = $ex->getMessage();
}      

*/ 
     // If result matched $myusername and $mypassword, table row must be 1 row

		
      if($name != NULL && $mypassword!=NULL ) {
         #session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	

	}
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
						<h1>Create an account</h1>
						<br>
						<h2>Personal Information</h2>
						<form action = "" method = "post">
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="name"  required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						    <div class="error_login"><?php echo $nameerror;?></div>

							</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email Address* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text"  name="email" required=" "/>
								
							</div>

							<div class="clearfix"> </div>
							<div class="error_login"><?php echo $emailerror;?></div>		

							</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Phone Number* :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="number"  required=" "/>
								
							</div>

							<div class="clearfix"> </div>
					        <div class="error_login"><?php echo $phoneerror;?></div>								

							</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="password"  required=" "/>
								
							</div>

							<div class="clearfix"> </div>
							<div class="error_login"><?php echo $passworderror;?></div>								

							</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password*:</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="passwordconfirm"  required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								
									<input type="submit" value="Create">
								
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


