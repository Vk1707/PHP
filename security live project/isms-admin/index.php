<?php
session_start();
include('../config.php');
?>
<?php
if(isset($_POST['login']))
{

	$logemail = $_POST['logemail'];
	$logpass = $_POST['logpass'];
	$theme = $_POST['theme'];
	$_SESSION['theme'] = $theme;

	$sql = "SELECT * FROM `sc_operator` WHERE sc_email='$logemail' AND 	sc_pass='$logpass'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$_SESSION['ademail'] = @$row['sc_email'];
	$_SESSION['adname'] = @$row['sc_name'];
	$_SESSION['adid'] = @$row['sc_empid'];
	$_SESSION['adpost'] = @$row['sc_post'];
	$scport = @$row['sc_post'];
	if($row == true)
	{
		header('Location:../inc/dashboard.php');
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
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="icon" type="image/gif" href="../assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  	<link rel="stylesheet" href="../assets/css/bootstrap.css">
  	<script src="../assets/js/jquery.js"></script>
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
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link blinked" href="../index.php">Got to Website</a>
			      </li>
			      
			    </ul>
			  </div>
			  </div>
			</nav>
		</div>
		<div class="slider-content">
			<div class="container">
				<div class="row mt-5">
					<div class="col-lg-6 col-md-6 py-5">
						<div class="logform">
							<h4>User Login</h4>
							<form class="" method="POST" action="">
								<div class="form-group">
									<label>Username / Email Address</label>
									<input type="email" name="logemail" class="trity" required placeholder="Email...">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="logpass" class="trity" required placeholder="Password...">
								</div>
              					<div class="form-group">
									<label>Select Theme</label>
									<select class="trity" name="theme">
										<option value="lightheme" selected="">Light Theme</option>
										<option value="darktheme">Dark Theme</option>
									</select>
								</div>
								<br>
								<div class="form-group">
									<input type="submit" name="login" class="btn btn-info" required>
								</div>
							</form>
							
							<p class="text-center tstsil">Silaris Informations Pvt Ltd &copy; <?php echo date('Y');?><a href="reset.php" class="passrest">Reset Password</a></p>
							<?php if(isset($msg))
							{
								echo $msg;
							}?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 py-5">
						<div class="slide-right">
							<img src="../assets/img/ismslogo-bw.png">
							<p>ISMS <span class="viti">SECURITY</span></p>
							<em>Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</em>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
</body>
</html>