<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['resetpass']))
{

	$logpass = $_POST['logpass'];
	$clogpass = $_POST['clogpass'];
	$em	= $_GET['em'];

	$sql = "SELECT * FROM `sc_users` WHERE sc_email='$em' AND sc_status='1'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$rpass = $row['sc_pass'];
	if($rpass == "Null")
    {
    	if($logpass == $clogpass)
    	{
        $sql = "UPDATE `sc_users` SET sc_pass='$logpass' WHERE sc_status='1' AND sc_email='$em'";
        $res = mysqli_query($conn,$sql);
        	if($res == true)
        	{
        	    header('Location:index.php');
        	}
    	}
    	else
    	{
        	echo "<script>alert('Confirm Password Not Match!')</script>";
    	}
    }
else
{
	echo "<script>alert('Password already Set!');location.href='index.php';</script>";
}
	


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ISMS Security</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/gif" href="assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  	<link rel="stylesheet" href="assets/css/bootstrap.css">
  	<script src="assets/js/jquery.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="navbar-blk">
		<div class="top-navbar">
			<nav class="navbar navbar-expand-md navbar-dark">
			  <!-- Brand --><div class="container">
			  <a class="navbar-brand" href="#">VERSION : 1.0.1</a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			   <!--  <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="#">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">About Us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Contact Us</a>
			      </li>
			    </ul> -->
			  </div>
			  </div>
			</nav>
		</div>
		<div class="slider-content">
			<div class="container">
				<div class="row mt-5">
					<div class="col-lg-6 col-md-6 py-5">
						<div class="logform">
							<h4>Create Your Password</h4>
							<form class="" method="POST" action="">
								<div class="form-group">
									<label>New Password</label>
									<input type="password" name="logpass" class="trity" required>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" name="clogpass" class="trity" required>
								</div>
								<br>
								<div class="form-group">
									<input type="submit" name="resetpass" class="btn btn-info" required value="Submit">
								</div>
							</form>
							
							<p class="text-center tstsil">Silaris Informations Pvt Ltd &copy; <?php echo date('Y');?></p>
							<?php if(isset($msg))
							{
								echo $msg;
							}?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 py-5">
						<div class="slide-right">
							<img src="assets/img/ismslogo-bw.png">
							<p>ISMS <span class="viti">SECURITY</span></p>
							<em>Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</em>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>