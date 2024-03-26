<?php
include('header.php');
?>
<?php

if(isset($_POST['pass']))
{
	$firstpass = $_POST['firstpass'];
	$confmpass = $_POST['confmpass'];
	if($confmpass === $firstpass)
	{
		$tst = "UPDATE `sc_users` SET sc_pass='$firstpass' WHERE sc_email='$ademail'";
		$tse = mysqli_query($conn,$tst);
		if($tse == true)
		{
			echo "<script>alert('Password Change Successfully!')</script>";
		}
	}
	else
	{
		echo "<script>alert('Password Not Match!')</script>";
	}

}
?>
	
	<div class="main-dash">
		<div class="top-dash">
			<nav class="navbar navbar-expand-md bgdark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="#">VERSION : 1.0.1</a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul class="navbar-nav ml-auto">
			      <!-- <li class="nav-item">
			        <a class="nav-link" href="#">Home</a>
			      </li> -->
			    <!--  <li class="nav-item">
			        <a class="nav-link" href="isms-policies.php">ISMS Policies</a>
			      </li> -->
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname?></a>
			         <div class="dropdown-menu">
				        <a class="dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profile</a>
				        <a class="dropdown-item" href="password.php"><i class="fa fa-lock"></i> Password</a>
				        <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
				      </div>
			      </li>
			    </ul>
			  </div>
			  
			</nav>
		</div>
		<div class="side-dash">
			<?php include('sidebar.php');?>
		</div>
		<div class="body-dash">
			<div class="row">
				<div class="col-lg-3">
					<div class="dis-card">
						<p style="color:#9294a5;text-align:center">Change Your Password</p>
						<form class="" method="POST">
							<div class="form-group">
								<input type="password" name="firstpass" class="form-control" required placeholder="New Password...">
							</div>
							<div class="form-group">
								<input type="password" name="confmpass" class="form-control" required placeholder="Confirm Password...">
							</div>
							<div class="form-group">
								<input type="submit" name="pass" class="btn btn-danger btn-block" value="Change Password">
							</div>
						</form>

					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>