<?php
include('header.php');
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
			        <a class="nav-link" href="isms-policies.php">ISMS Policies</a>
			      </li>
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
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-group"></i>
							</div>
							<div class="dis-right float-right">
								<a href="it-staff.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>IT Staff Details <!-- <span class="badge badge-danger dis-blink">5</span> --></p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-cubes"></i>
							</div>
							<div class="dis-right float-right">
								<a href="switch-invenroty.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Switch Inventory </p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-recycle"></i>
							</div>
							<div class="dis-right float-right">
								<a href="get-pass-list.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Scrap Details</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-server"></i>
							</div>
							<div class="dis-right float-right">
								<a href="user-creation.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Server Details</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div> <!-- close row div -->
              
              <div class="row">
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-laptop"></i>
							</div>
							<div class="dis-right float-right">
								<a href="email-request.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Laptop Inventory</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-volume-control-phone"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-policies.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Dialers Utilization</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-film"></i>
							</div>
							<div class="dis-right float-right">
								<a href="get-pass-list.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Firewall Inventroy</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-id-card"></i>
							</div>
							<div class="dis-right float-right">
								<a href="user-creation.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Licenses Inventory</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div> <!-- close 2 row div -->
              
              <div class="row">
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-map-o"></i>
							</div>
							<div class="dis-right float-right">
								<a href="email-request.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>System Details</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-map-signs"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-policies.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Wanlink Details</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-hdd-o"></i>
							</div>
							<div class="dis-right float-right">
								<a href="get-pass-list.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>VOIP Getway</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="dis-right float-right">
								<a href="user-creation.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Purchase Details</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div> <!-- close 3 row div -->
              
              <div class="row">
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-map-marker"></i>
							</div>
							<div class="dis-right float-right">
								<a href="email-request.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Silaris GGN</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-line-chart"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-policies.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>NW Diagram </p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-podcast"></i>
							</div>
							<div class="dis-right float-right">
								<a href="get-pass-list.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>PC Deployed</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-user-plus"></i>
							</div>
							<div class="dis-right float-right">
								<a href="user-creation.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>Tracker</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			</div> <!-- close 4 row div -->
		</div>
	</div>

<?php
include('footer.php');
?>