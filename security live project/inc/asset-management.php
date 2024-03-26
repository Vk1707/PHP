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
					<a href="it-staff.php" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/staff.png" class="img-fluid">
								</li>
								<li class="dd-text">IT Staff Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/switch.png" class="img-fluid">
								</li>
								<li class="dd-text">Switch Inventory</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/scrap.png" class="img-fluid">
								</li>
								<li class="dd-text">Scrap Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/server.png" class="img-fluid">
								</li>
								<li class="dd-text">Server Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/laptop.png" class="img-fluid">
								</li>
								<li class="dd-text">Laptop Inventory</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/dieler.png" class="img-fluid">
								</li>
								<li class="dd-text">Dialers Utilization</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/firwall.png" class="img-fluid">
								</li>
								<li class="dd-text">Firewall Inventroy</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/lincense.png" class="img-fluid">
								</li>
								<li class="dd-text">Licenses Inventory</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/pcdetails.png" class="img-fluid">
								</li>
								<li class="dd-text">System Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/wanlink.png" class="img-fluid">
								</li>
								<li class="dd-text">Wanlink Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/voip.png" class="img-fluid">
								</li>
								<li class="dd-text">VOIP Getway</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/purchase.png" class="img-fluid">
								</li>
								<li class="dd-text">Purchase Details</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/ggn.png" class="img-fluid">
								</li>
								<li class="dd-text">Silaris GGN</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/diagram.png" class="img-fluid">
								</li>
								<li class="dd-text">NW Diagram</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/deployed.png" class="img-fluid">
								</li>
								<li class="dd-text">PC Deployed</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
				<div class="col-lg-3">
					<a href="" class="dd-card">
						<div class="dd-face"></div>
						<div class="dd-body">
							<ul>
								<li>
									<img src="../assets/img/icon/tracker.png" class="img-fluid">
								</li>
								<li class="dd-text">Tracker</li>
							</ul>
							
						
						</div>
						
					</a>
				</div>
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>