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
			   <!--   <li class="nav-item">
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
				<div class="col-lg-3 col-md-3">
					<div class="dis-menu">
						
						<ul class="dis-file-menu">
							<?php
								$sql = "SELECT * FROM `sc_ismsfile`";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<li><a href="../uploads/<?php echo $row['sc_filetemp']?>" target="iframe_a"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_filename']?></a></li>
									<?php
								}
							?>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<div class="dis-file-view">
						<iframe src="" name="iframe_a" class="iframeclass">			
						</iframe>
					</div>
				</div>
			</div>
			
		</div>
	</div>

<?php
include('footer.php');
?>