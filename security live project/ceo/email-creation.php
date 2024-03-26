<?php
include('header.php');
?>
<?php
if(isset($_POST['comsub']))
{
	
	$snonum = $_POST['snonum'];
	$comment = $_POST['comment'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$esql = "UPDATE `sc_emailcreation` SET `sc_hrdepart`='1', `sc_hrcomment`='$comment' WHERE `sc_sno`='$snonum'";
	$eres = mysqli_query($conn,$esql);
	if($eres == true)
	{
		header('Location:email-creation.php');
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
						<td>Name</td>
						<td>Employee ID</td>
						<td>Designation</td>
						<td>Suggested Email</td>
						<td>Reporting to</td>
						<td>HR Deprt</td>
						<td>Comment</td>
						
						<td>Action</td>
					</thead>
					<tbody>
						<form class="" method="POST" action="">
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_hrdepart='0'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								
								<tr>

									<td><?php echo $num;?><input type="hidden" name="snonum" value="<?php echo $trow['sc_sno'];?>"></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_reportingto'];?></td>
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
									<td><input type="text" name="comment" class="conform"></td>
									
									
									<td><input type="submit" name="comsub" class="btncom" value="Confired"></td>
								</tr>
								
								<?php
								$num++;
							}
						?>
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<?php
include('footer.php');
?>