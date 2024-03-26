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
              			<td>Request Date</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
              			<td>Process</td>
              			<td>Email Address</td>
						<td>Designation</td>
						<td>Already Access</td>
						<td>Email Access</td>
						<td>Reporting to</td>
						<td>ISMS Dept.</td>
              			<td>ISMS Comment</td>
              			<td>CEO</td>
						<td>Email Dept.</td>
						<td>Action</td>
					</thead>
					<tbody>
						<form class="" method="POST" action="">
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_emailteam='1' AND `sc_action`='5' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_empname'];?>
										<input type="hidden" name="snot" value="<?php echo $trow['sc_sno'];?>">
									</td>
									<td><?php echo $trow['sc_empid'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
                                    <td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_existemail'];?></td>
									<td><?php echo html_entity_decode($trow['sc_externalids']);?><br><?php echo html_entity_decode($trow['sc_trainerids']);?><br><?php echo html_entity_decode($trow['sc_adminids']);?><br><?php echo html_entity_decode($trow['sc_itismsids']);?><br><?php echo html_entity_decode($trow['sc_oprationids']);?></td>
									<td><?php echo $trow['sc_createdby'];?></td>
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
                                    <td><?php echo $trow['sc_ismscomment'];?></td>
                                    <td><?php
									$hrid = $trow['sc_ceo']; 
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
									$hrid = $trow['sc_emailteam']; 
									if($hrid == "1")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$hrid = $trow['sc_emailteam']; 
                            		$eval = $trow['sc_sno'];
									if($hrid == "1")
									{
										echo '<a href="ent-exist-email-providing.php?sid='.$eval.'" class="aprv">Approve</a>';
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
					</form>
				</table>
			</div>
		</div>
	</div>


<?php
include('footer.php');
?>