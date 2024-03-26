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
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<h2 class="text-center float-left" style="color:#0A1551">PRI Tracker</h2><br>
			  <hr size="8" width="100%" color="#23262C"><br>
					<thead class="bgsky">
						<th>S.No</th>
						<th>Process</th>		
						<th>Total PRI</th>
						<th>PRI-140</th>
						<th>PRI-Normal</th>
						<th>Details</th>
						
					
						
					</thead>
					<tbody>
						<?php
						
							$tsql = "SELECT count(*) as total,process_name FROM `pri_tracker` group by process_name order by sr_no desc";
							$tres=mysqli_query($conn,$tsql);

							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['process_name'];?></td>
									<td><?php echo $trow['total'];?></td>
									<?php
									$p=$trow['process_name'];
									$tsql1 = "SELECT * FROM `pri_tracker` where type='PRI-140' and process_name='$p'";
									$tres1=mysqli_query($conn,$tsql1);

									$count_140=mysqli_num_rows($tres1)
									?>

									<td><?php echo $count_140;?></td>
									<?php
									
									$tsql2= "SELECT * FROM `pri_tracker` where type='PRI-Normal' and process_name='$p'";
									$tres2=mysqli_query($conn,$tsql2);

									$count_normal=mysqli_num_rows($tres2)
									?>

									<td><?php echo $count_normal;?></td>
									<td><a href="pri_details.php?id=<?php echo $p;?>"> Click here to Update / Move PRIs</a></td>
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