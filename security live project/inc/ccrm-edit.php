<?php
include('header.php');
?>
<?php


if(isset($_POST['datasave']))
{
	$tid = $_GET['tid'];
	$raisedate = $_POST['raisedate'];
	$typechange = $_POST['typechange'];
	$location = $_POST['location'];
	$descripchange = $_POST['descripchange'];
	$nature = $_POST['nature'];
	$startdate = $_POST['startdate'];
	$expectdate = $_POST['expectdate'];
	$priority = $_POST['priority'];
	$ismsimpact = $_POST['ismsimpact'];
	$possiblmpact = $_POST['possiblmpact'];
	$approveby = $_POST['approveby'];
	$purpose = $_POST['purpose'];
	$process = $_POST['process'];
	$owner = $_POST['owner'];
	$message = $_POST['message'];
	$willchange = $_POST['willchange'];
	$regression = $_POST['regression'];
	$backout = $_POST['backout'];
	$changefails = $_POST['changefails'];
	$conflicting = $_POST['conflicting'];
	


	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');
	$yr = date('Y');
	$mr = date('m');

	$cstl = "UPDATE `sc_ccrmdata` SET `sc_ccrmdate`='$raisedate', `sc_typeofchange`='$typechange', `sc_location`='$location', `sc_description`='$descripchange', `sc_natureofchange`='$nature', `sc_startdate`='$startdate', `sc_expectedate`='$expectdate', `sc_priority`='$priority', `sc_ismsimpact`='$ismsimpact', `sc_possibleimpact`='$possiblmpact', `sc_ismsapprove`='$approveby', `sc_purposeofchange`='$purpose', `sc_porocessowner`='$process', `sc_owner`='$owner', `sc_fulldescription`='$message', `sc_custmbusiness`='$willchange', `sc_regression`='$regression',`sc_backout`='$backout',`sc_potenial`='$changefails', `sc_conflicting`='$conflicting' WHERE sc_sno='$tid'";

	$csres = mysqli_query($conn,$cstl);
	if($csres == true)
	{
		header('Location:ccrm.php');
	}
	else
	{
		echo "<script>alert('Message Data Wrong!')</script>";
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
			<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$cmst = "SELECT * FROM `sc_ccrmdata` WHERE sc_sno='$tid' AND sc_status='1'";
					$cres = mysqli_query($conn,$cmst);
					$crow = mysqli_fetch_array($cres);
				}
			?>
			<form class="" method="POST" action="">
				<div class="table-responsive">
			<table class="table table-bordered custometh">
				<tr>
					<th>CCRM Number</th>
					
					<td><?php echo $crow['sc_ccrmno'];?></td>
							
					
					<th>CCRM Raised Date</th>
					<td><input type="datetime-local" name="raisedate" value="<?php echo $crow['sc_ccrmdate'];?>" class="inputap"></td>
					<th>Type of Change</th>
					<td><select class="inputap" name="typechange">
						<option value="<?php echo $crow['sc_typeofchange'];?>" selected=""><?php echo $crow['sc_typeofchange'];?></option>
						<option value="Installation">Installation</option>
						<option value="Upgrade">Upgrade</option>
						<option value="Maintenance">Maintenance</option>
						<option value="Replacement">Replacement</option>
						<option value="Movement">Movement</option>
					</select></td>
					
				</tr>
				<tr>
					<th>Location</th>
					<td><input type="text" name="location" value="<?php echo $crow['sc_location'];?>" class="inputap"></td>
					<th>Description of change</th>
					<td><input type="text" name="descripchange" value="<?php echo $crow['sc_description'];?>" class="inputap"></td>
					<th>Nature of Change</th>
					<td><select class="inputap" name="nature">
						<option value="<?php echo $crow['sc_natureofchange'];?>" selected=""><?php echo $crow['sc_natureofchange'];?></option>
						<option value="Normal">Normal</option>
						<option value="Emergency">Emergency</option>
						
					</select>
					</td>
				</tr>
				<tr>
					
					<th>Start Date|Time</th>
					<td><input type="datetime-local" name="startdate" value="<?php echo $crow['sc_startdate'];?>" class="inputap"></td>
					<th>Expected Date|Time</th>
					<td><input type="datetime-local" name="expectdate" value="<?php echo $crow['sc_expectedate'];?>" class="inputap"></td>
					<th>Priority</th>
					<td><input type="text" name="priority" value="<?php echo $crow['sc_priority'];?>" class="inputap"></td>
					
				</tr>
				<tr>
					<th>Information Security Impact</th>
	<td><input type="text" name="ismsimpact" value="<?php echo $crow['sc_ismsimpact'];?>" class="inputap"></td>
					<th>Possible Impact Details</th>
					<td><input type="text" name="possiblmpact" value="<?php echo $crow['sc_possibleimpact'];?>" class="inputap"></td>
					<th>Security Impact Approved By</th>
					<td>
						<select class="inputap" name="approveby">
						<option value="<?php echo $crow['sc_ismsapprove'];?>"  selected=""><?php echo $crow['sc_ismsapprove'];?></option>
						<option value="samarth.jain@silaris.in">Samarth Jain</option>
						<option value="pinaki.narendra@silaris.in">Pinaki Narendra</option>
						<option value="isms@silaris.in">Tanay Dobhal</option>
						
					</select>

					</td>
					
				</tr>
				<tr>
					<th>Purpose for the Changes</th>
					<td><input type="text" name="purpose" value="<?php echo $crow['sc_purposeofchange'];?>" class="inputap"></td>
					<th>Process Owner</th>
					<td><input type="text" name="process" value="<?php echo $crow['sc_porocessowner'];?>" class="inputap"></td>
					<th>Owner</th>
					<td><input type="text" name="owner" value="<?php echo $crow['sc_owner'];?>" class="inputap"></td>
				</tr>
				<tr>
					<td colspan="6"><textarea name="message" class="messat"><?php echo $crow['sc_fulldescription'];?></textarea></td>
				</tr>
				<tr>
					<th colspan="4">Will this change cause an outage to customer/business?</th>
					<td colspan="2"><input type="text" name="willchange" value="<?php echo $crow['sc_custmbusiness'];?>" class="inputap"></td>
					
				</tr>
				<tr>
					
					<th colspan="4">Regression procedure (In case of failure due to changes made)</th>
					<td colspan="2"><input type="text" name="regression" value="<?php echo $crow['sc_regression'];?>" class="inputap"></td>
					
				</tr>
				<tr>
					
					<th colspan="4">Request time to back out</th>
					<td colspan="2"><input type="text" name="backout" value="<?php echo $crow['sc_backout'];?>" class="inputap"></td>
					
					
				</tr>
				<tr>
						
					<th colspan="4">Potential Impact if the change fails</th>
					<td colspan="2"><input type="text" name="changefails" value="<?php echo $crow['sc_potenial'];?>" class="inputap"></td>
					
				</tr>
				<tr>
						
					<th colspan="4">Proposed change conflicting with any other planned change for the same day</th>
					<td colspan="2"><input type="text" name="conflicting" value="<?php echo $crow['sc_conflicting'];?>" class="inputap"></td>
					
				</tr>
				
				
				<tr>
					<td colspan="4"></td>
					<td>
						
					</td>
					<td>
						<input type="submit" name="datasave" class="sbsave">
					</td>
					
					
				</tr>
			</table>
			</div>
			</form>
		</div>
	</div>

<?php
include('footer.php');
?>