<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_POST['emailacess']))
{
	
	$opids = strtolower($_POST['opids']);
	$itismsids = strtolower($_POST['itismsids']);
	$adminids = strtolower($_POST['adminids']);
	$tainerids = strtolower($_POST['tainerids']);
	$externalids = strtolower($_POST['externalids']);
	$srno = $_POST['srno'];
	
	

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$csq = "SELECT * FROM `sc_emailcreation` WHERE `sc_sno`='$srno'";
	$crs = mysqli_query($conn,$csq);
	$crow = mysqli_fetch_array($crs);
	$ceml = $crow['sc_reportingto'];

	$eid = $crow['sc_empid'];
	$enam = $crow['sc_empname'];
	$edes = $crow['sc_designation'];
	$opet = $crow['sc_oprationids'];
	$itid = $crow['sc_itismsids'];
	$adminid = $crow['sc_adminids'];
	$train = $crow['sc_trainerids'];
	$extrn = $crow['sc_externalids'];

		$csql = "UPDATE `sc_emailcreation` SET `sc_oprationids`='$opids',sc_itismsids='$itismsids',sc_adminids='$adminids',sc_trainerids='$tainerids',sc_externalids='$externalids',`sc_action`='2' WHERE `sc_sno`='srno'";
		$cres = mysqli_query($conn,$csql);


		$mail->addAddress('email.support@silaris.in', 'Arun Dogra');
		$mail->addCC($ademail,$adname);
		$mail->Subject = 'New Email Access';
    	$mail->Body.= 'Hi Email Team, <br> <br> Employee has send request for access, please share your input. For reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$enam.'</td>';
    	$mail->Body.='<td>'.$eid.'</td>';
    	$mail->Body.='<td>'.$edes.'</td>';
    	$mail->Body.='<td>'.$ceml.'</td>';
    	$mail->Body.='<td>'.$opet.$itid.$adminid.$train.$extrn.'</td>';
    	$mail->Body.='<td>To be filled by IT Dept:</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	$mail->send();

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
			<div class="row mb-4">
				
				<div class="col-lg-12 col-md-12">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Email Access</button>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Date || Time</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Email ID</td>
						<td>Process</td>
						<td>Designation</td>
						<td>Email Access</td>
						<td>Reporting to</td>
						<td>Email Dept.</td>
						<td>ISMS</td>
						<td>CEO</td>
              			<td>Email Dept.</td>
						<td>Access Provided</td>
					</thead>
					<tbody>
						<?php
							$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND sc_action='2' AND sc_createdemail='$ademail' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_process'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo $trow['sc_oprationids']."<br>".$trow['sc_itismsids']."<br>".$trow['sc_adminids']."<br>".$trow['sc_trainerids']."<br>".$trow['sc_externalids'];?></td>
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
									$hrid = $trow['sc_emailteam']; 
									if($hrid == "2")
									{
										
										echo "<img src='../assets/img/green.png'>";
									}
									else
									{
										echo "<img src='../assets/img/red.png'>";
									}
									
									?></td>
                                    <td><?php
									$act = $trow['sc_action']; 
									if($act == "2")
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
				<div class="col-lg-12 col-md-12">
					<label>Name of Employee</label>
				<select class="form-control" name="srno">
					<option value="" disabled="" selected="">Select Employee</option>
					<?php
					$csql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND sc_action='1' AND sc_createdemail='$ademail'";
					$cres = mysqli_query($conn,$csql);
					while($crow = mysqli_fetch_array($cres))
					{
						?>
						<option value="<?php echo $crow['sc_sno'];?>"><?php echo $crow['sc_empname'];?> (<?php echo $crow['sc_empid'];?>) (<?php echo $crow['sc_suggestemail'];?>)</option>
						<?php
					}
					?>
				</select>
				</div>
				

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<span class="font-weight-bold">Enter Send / Recieve Email Access</span>
					<label>Operation ID <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="opids"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<br>
					<label>IT / ISMS ID <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="itismsids"></textarea>
				</div>
				
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">

					<label>Admin ID <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="adminids"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Trainer / Quality Dept. <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="tainerids"></textarea>
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>External Domain (If any) <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="externalids"></textarea>
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