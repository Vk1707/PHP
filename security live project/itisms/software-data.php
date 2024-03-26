<?php
include('header.php');
include_once("../emailconfig.php");


?>


<?php



if (isset($_POST['add_trainee'])) {

	print_r($_POST);

	$ad_inventory = $_POST['inventory'];
	$version = $_POST['version'];
	$licence = $_POST['licence'];
	$deploy = $_POST['deploy'];
	$balance = $_POST['balance'];




	$sql = "INSERT INTO `sc_inventory`(`inventory`, `version`, `licence`, `deploy`, `balance`) VALUES ('$ad_inventory','$version','$licence','$deploy','$balance')";
	$sql_run = $conn->query($sql);

	if ($sql_run) {


		echo '
     <script>
    window.location.href="./software-data.php";
    </script>
    
    ';
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
	<div class="body-dash">
		<div class="row mb-4">

			<div class="col-lg-12 col-md-12">
				<button class="btndanger float-right mx-2" id="addform"> <i class="fa fa-user-plus"> </i> Add Software</button>
				<a href="./view-software.php" class="btndanger float-right mx-2" id="addform"> <i class="fa fa-eye"> </i> View</a>
				<a href="./auditor_remarks.php" class="btndanger float-right mx-2" id="addform"> <i class="fa fa-comments-o"> </i> Auditor Remark</a>
				<a href="./review.php" class="btndanger float-right mx-2" id="addform"> <i class="fa fa-star-o"> </i> Review</a>
			</div>
		</div>
		<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead class="bgsky">
					<td>S.No</td>
					<td>Software Name</td>
					<td>Version</td>
					<td>Licence</td>
					<td>Deploy</td>
					<td>Balance</td>
					<td>Edit</td>
					<td>Jan. Audit</td>
					<td>Apr. Audit</td>
					<td>Jul. Audit</td>
					<td>Oct. Audit</td>
				</thead>
				<tbody>
					<?php
					$num = 1;
					$tsql = "SELECT * FROM `sc_inventory`";
					$tres = mysqli_query($conn, $tsql);
					while ($trow = mysqli_fetch_array($tres)) {
					?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><a href="review.php?inventory=<?php echo $trow['inventory'] ?>"><?php echo $trow['inventory']; ?></a></td>
							<td><?php echo $trow['version']; ?></td>
							<td><?php echo $trow['licence']; ?></td>
							<td><?php echo $trow['deploy']; ?></td>
							<td><?php echo $trow['balance']; ?></td>
							<td><a href="#" class="editc">Edit </a></td>
							<td>

								<?php
								if ($trow['auditor_remark'] != "") {
									echo "Done";
								} else {
									echo "Pending";
								}

								?>

							</td>
							<td>15 April 2024</td>
							<td>15 July 2024</td>
							<td>15 October 2024</td>
						</tr>
					<?php
						$num++;
					}
					?>
					<tr>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-lg-4 col-md-6">
					<label>Inventory Name</label>
					<input type="text" name="inventory" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-6">
					<label>Version</label>
					<input type="text" name="version" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-6">
					<label>Licence</label>
					<input type="text" name="licence" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-4 col-md-6">
					<label>Deploy</label>
					<input type="text" name="deploy" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-6">
					<label>Balance</label>
					<input type="text" name="balance" class="form-control" required>
				</div>

			</div>

			<div class="form-group">
				<input type="submit" name="add_trainee" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>