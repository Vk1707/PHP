<?php
function admin()
{
if(strlen($_SESSION['ademail'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION['ademail']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>