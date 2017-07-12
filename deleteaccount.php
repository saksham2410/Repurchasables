


<?php

include('session.php');
$email=$_SESSION['login_user'];
$sql = "DELETE FROM repurads WHERE email='$email'";		
$result = mysqli_query($db,$sql);
 if (!$result){
		  printf("Error %s \n", mysqli_error($db));
		  exit();
		  
	  }
	  
$sql = "DELETE FROM repurchasableslogin WHERE email='$email'";		
$result = mysqli_query($db,$sql);
 if (!$result){
		  printf("Error %s \n", mysqli_error($db));
		  exit();
		  
	  }

session_destroy();
	  
header("Location: accountdeleted.php");

			
?>


