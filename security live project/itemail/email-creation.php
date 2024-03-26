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
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Date || Time</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
              			<td>Process</td>
						<td>Designation</td>
						<td>Suggested Email</td>
						<td>Reporting to</td>
						<td>HR Dept.</td>
						<td>ISMS Dept</td>
						
						<td>Email Support</td>
						
						<td>Action</td>
					</thead>
					<tbody>
						
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_isms='1' AND sc_itdepart='0' AND sc_action='0' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								
								<tr>
									
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_createdby'];?></td>
									<td><?php
									$hrid = $trow['sc_hrdepart']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$hrid = $trow['sc_isms']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									
									<td><?php
									$hrid = $trow['sc_itdepart']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$hrid = $trow['sc_itdepart']; 
                            		$eval = $trow['sc_sno'];
									if($hrid == "0")
									{
										echo '<a href="ent-email-creation.php?sid='.$eval.'" class="aprv">Approve</a>';
									}
									else
									{
										echo "";
									}
									
									?></td>
								</tr>
								
								<?php
								$num++;
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>


<?php
include('footer.php');
?>