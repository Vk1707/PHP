<?php
include('header.php');
include_once("../emailconfig.php");

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

					<li class="nav-item">
						<a class="nav-link" href="#">Employee Formate</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="isms-topics.php">ISMS Topics</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname ?></a>
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
		<?php include('sidebar.php'); ?>
	</div>
	<?php
	if (isset($_POST['add_trainee'])) {


		$sql_up = "UPDATE `sc_inventory` SET checker='$_POST[review_done]',auditor='$_POST[audit]',review='$_POST[reviewer]'";

		$sql_run = $conn->query($sql_up);
		if ($sql_run) {
			echo '<script>
                        
                        window.location.href="./software-data.php";
                        </script>';
		}
	}

	?>




	<div class="" id="internal1">
		<div class="infernal-disp">
			<form class="" method="POST" action="" enctype="multipart/form-data">

				<div class="form-group row">
					<div class="col-lg-6 col-md-6">
						<label for="">Select Month: </label>
						<select class="form-control" name="process" required>
							<option value="" disabled="" selected="">Select Audit Quarterly Months</option>
							<option value="Jan">January</option>
							<option value="April">April</option>
							<option value="July">July</option>
							<option value="October">October</option>
						</select>
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Review Done By</label>
						<input type="text" name="review_done" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-6 col-md-6">
						<label>Audit Verify By</label>
						<input type="text" name="audit" class="form-control" required>
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Review</label>
						<input type="text" name="reviewer" class="form-control" required>
					</div>

				</div>
				<div class="form-group">
					<input type="submit" name="add_trainee" class="btn btn-dark" value="Submit">
					<button id="closeform1" class="btn btn-danger ml-2">Close</button>
				</div>

			</form>
		</div>
	</div>
	<?php
	include('footer.php');
	?>