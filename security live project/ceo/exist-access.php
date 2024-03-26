<?php
include('header.php');
?>
<?php
if(isset($_POST['emailacess']))
{
	
	$emailad = strtolower($_POST['emailac']);
	$empname = $_POST['empname'];
	
	

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

		$csql = "UPDATE `sc_emailcreation` SET `sc_emailaccess`='$emailad',`sc_action`='1' WHERE `sc_empid`='$empname'";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:email-access.php');
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
			<div class="row mb-4">
				
				<div class="col-lg-12 col-md-12">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Email Access</button>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Name</td>
						<td>Employee ID</td>
						<td>Designation</td>
						<td>Email Access</td>
						<td>Reporting to</td>
						<td>Email Team</td>
						<td>Existing Access</td>
						<td>ISMS</td>
              			<td>ISMS Comment</td>
						<td>CEO</td>
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND `sc_action`='1'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_emailaccess'];?></td>
									<td><?php echo $trow['sc_reportingto'];?></td>
									<td><?php
									$hrid = $trow['sc_emailteam']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php echo $trow['sc_existemail'];?></td>
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
									$proav = $trow['sc_ceo']; 
									if($proav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									
									
									<td><?php
									$act = $trow['sc_action']; 
									if($act == "1")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
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
				<div class="col-lg-6 col-md-6">
					<label>Name of Employee</label>
				<select class="form-control" name="empname">
					<option value="" disabled="" selected="">Select Employee</option>
					<?php
					$csql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1'";
					$cres = mysqli_query($conn,$csql);
					while($crow = mysqli_fetch_array($cres))
					{
						?>
						<option value="<?php echo $crow['sc_empid'];?>"><?php echo $crow['sc_empname'];?></option>
						<?php
					}
					?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Mention Email Address to Access <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="emailac"></textarea>
				</div>
				
				
			</div>
			
			
			<div class="form-group">
				<input type="submit" name="emailacess" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>