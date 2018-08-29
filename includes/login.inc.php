<?php
session_start();

if(isset($_POST['submit']))
{
	include 'connection.php';
	
	$uid=mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

	$sql="SELECT * FROM users WHERE user_uid='$uid' AND user_pwd='$pwd'";
	$result=mysqli_query($conn,$sql);

	$resultCheck=mysqli_num_rows($result);

	if ($resultCheck<1) 
	{

		// header("Location:../index.php?login=error");
		?>

		<script type="text/javascript">
		alert("Invalid user name or password");
		window.location.href = "../index.php";
		</script>
		
		<?php

		

		exit(); 
	}

	else
	{

		if ($row=mysqli_fetch_assoc($result)) 
		{

			//login the user here
	 		$_SESSION['u_id']=$row['user_uid'];
	 		$_SESSION['first']=$row['user_first'];
	 		$_SESSION['u_last']=$row['user_last'];
	 		$_SESSION['u_email']=$row['user_email'];
	 		$_SESSION['u_uid']=$row['user_uid'];
	 		$_SESSION["logged"]="login";
	 		$_SESSION['fromMain']="true";
	 		
	 		// header("Location: ../home.php");

	 	

	 		if ($row['user_uid'] == 'admin')
	 	
	 		{

				header('Location:../admin.php');
			}
			else{

				header('Location:../home.php');	
				exit();

	 			}

	 	}
	}

}
?>
