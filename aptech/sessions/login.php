<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$userid = $_POST['userid'];
    $password = $_POST['password'];

	if(empty($userid))
	{
		echo "User id is required";
	}
	else
	{
		$_SESSION['userid']=$userid;
		header('location:home.php');
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		#login-form{
			height:30%;
			width:40%;
			left:30%;
			top:35%;
			position: absolute;
			background-color:orange;
		}
	</style>
</head>
<body>
	<div id="login-form">
		<form method="post">
			User Id <br>
			<input type="text" name="userid">
			<br>
			<br>

			Password <br>
			<input type="password" name="password">
			<br>
			<br>

			<input type="submit" value="Login">


		</form>
	</div>
</body>
</html>