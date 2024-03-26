<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_POST['emailcase']))
{
	
	$emailad = htmlspecialchars($_POST['emailad']);
	
	$empname = $_POST['empname'];
	$prefix = $_POST['prefix'];
	$empd = strtoupper($_POST['empid']);
	$empid = $prefix.$empd;
	$process = $_POST['process'];
	$manager = $_POST['manager'];
	$desigtn = $_POST['desigtn'];
	$reporting = $_POST['reporting'];
	

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$csql = "INSERT INTO `sc_emailcreation`(`sc_empname`, `sc_empid`, `sc_process`, `sc_designation`, `sc_suggestemail`, `sc_reportingto`, `sc_processhead`, `sc_status`, `sc_action`, `sc_createdon`, `sc_createdby`, `sc_createdemail`) VALUES ('$empname','$empid','$process','$desigtn','$emailad','$reporting','$manager','1','0','$daytime','$adname','$ademail')";

	
		$cres = mysqli_query($conn,$csql);
		$mail->addAddress('aarti.dogra@silaris.in', 'Aarti Dogra');
		$mail->addCC($ademail,$adname);
		$mail->Subject = 'Email ID Creation Request';
    	$mail->Body.= 'Hi HR Team, <br>Kindly login in http://isms.silaris.in & confirm the status of below mention employee to approve.<br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
    	$mail->Body.='<th>Process</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$empname.'</td>';
    	$mail->Body.='<td>'.$empid.'</td>';
    	$mail->Body.='<td>'.$process.'</td>';
    	$mail->Body.='<td>'.$desigtn.'</td>';
    	$mail->Body.='<td>'.$adname.'</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Please confirm, does mentioned employee exist or not';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	$mail->send();

		if($cres == true)
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
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Email Creation</button>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Date || Time</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Process / Dept.</td>
						<td>Designation</td>
						<td>Reporting to</td>
						<td>Suggested Email</td>
						<td>HR Dept.</td>
						<td>Process / Dept. AVP / VP</td>
						<td>IT VP</td>
						<td>Email Support</td>
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND sc_action='0' AND sc_createdemail='$ademail' ORDER BY sc_sno DESC";
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
									<td><?php echo $trow['sc_reportingto'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
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
									$proav = $trow['sc_processavp']; 
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
									$itav = $trow['sc_itavp']; 
									if($itav == "0")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$itdp = $trow['sc_itdepart']; 
									if($itdp == "0")
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
									if($act == "0")
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
				<input type="text" name="empname" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					SIPLIND <input type="radio" name="prefix" value="SIPLIND" checked> SIPLTEM <input type="radio" name="prefix" value="SIPLTEM">
					
				<input type="number" name="empid" class="form-control" required>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="process" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Designation</label>
					<input type="text" name="desigtn" class="form-control" required>
				</div>
				
			</div>
            <div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Reporting to</label>
				<input type="text" name="reporting" class="form-control" required>
				</div>
				
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>AVP / VP of the Process / Dept.</label>
					<select name="manager" class="form-control" required>
						<option value="" disabled="" selected="">Select Process Head</option>
                        <option value="samarth.jain@silaris.in">Samarth Jain</option>						
						<option value="puneet.bhutani@silaris.in">Puneet Bhutani</option>
						<option value="anu.wig@silaris.in">Anu Wig</option>
						<option value="prashant.arora@silaris.in">Prashant Arora</option>
						<option value="sunita.yadav@silaris.in">Sunita Yadav</option>
                        <option value="shalini.agarwal@silaris.in">Shalini Agarwal</option>
                        <option value="sanjay.kumar@silaris.in">Sanjay Kumar</option>
                        <option value="vinod.anand@silaris.in">Vinod Anand</option>
                        
					</select>
				
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Enter Email ID ( Which need to create)</label>
                        <input type="text" name="emailad" class="form-control" required>
					<span class="text-danger"> <small>If required generic email id then first consult with ISMS Officer</small></span>
				
				</div>

				
			</div>
			
			<div class="form-group">
				<input type="submit" name="emailcase" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>