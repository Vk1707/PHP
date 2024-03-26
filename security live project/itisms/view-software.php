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
				<a href="export-software.php" class="btn btn-danger"><i class="fa fa-cloud-download"></i> Export Data</a>
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
					<td>Audit Done By</td>
					<td>Auditor</td>
					<td>Auditor Remark</td>
					<td>Review</td>
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
							<td><?php echo $trow['inventory']; ?></td>
							<td><?php echo $trow['version']; ?></td>
							<td><?php echo $trow['licence']; ?></td>
							<td><?php echo $trow['deploy']; ?></td>
							<td><?php echo $trow['balance']; ?></td>
							<td><?php echo $trow['checker']; ?></td>
							<td><?php echo $trow['auditor']; ?></td>
							<td><?php echo $trow['auditor_remark']; ?></td>
							<td><?php echo $trow['auditor']; ?></td>
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