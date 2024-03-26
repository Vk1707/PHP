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
			      </li> 
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

			<!-- <?php echo $_GET['id']; ?> -->
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<h2 class="text-center float-left" style="color:#0A1551">PRI Tracker</h2><br>
			  <hr size="8" width="100%" color="#23262C"><br>
					<thead class="bgsky">
						<th>S.No</th>
						<th>PRI Number</th>		
						<th>Type</th>	
						<th>Process Name</th>
						
						
					</thead>
					<tbody>
						<?php
						     $pn=$_GET['id'];
						
							$tsql = "SELECT * FROM `pri_tracker` where process_name='$pn' AND avp_email='$ademail' order by sr_no desc";
							$tres=mysqli_query($conn,$tsql);

							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									

									
									<?php
									if ($trow['owner_name']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['pri_number'];
										$pn=$trow['process_name'];
										echo $p; ?><br><font color="red">Not Updated</font></td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['pri_number'];?></td>

									<?php } ?>
									<td><?php echo $trow['type'];?></td>
									
									
									<td><?php echo $trow['process_name'];?></td>
								
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

	</div>
</div>
<?php
include('footer.php');
?>