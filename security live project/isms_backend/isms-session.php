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
			        <a class="nav-link" href="isms-topics.php">ISMS Topics</a>
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
			<!-- <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Name</td>
						<td>Employee ID</td>
						<td>Email</td>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Dilip Kumar</td>
							<td>SIPLIND17501</td>
							<td>dilip.kumar@silaris.in</td>
						</tr>
					</tbody>
				</table>
			</div> -->
			<div class="row">
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-envelope"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-test-request-view.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>ISMS Session Request</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
			
				<div class="col-lg-3">
					<div class="dis-card">
						<div class="dis-top clearfix">
							<div class="dis-icon float-left">
							<i class="fa fa-envelope"></i>
							</div>
							<div class="dis-right float-right">
								<a href="isms-session-officer.php" class=""><i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="dis-body">
							<p>ISMS Session Officer</p>
						</div>
						<div class="dis-foot"></div>

					</div>
				</div>
				
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>