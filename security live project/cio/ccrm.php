<?php
include('header.php');
?>
<?php
switch($ademail)
{
	case "rajesh.bisht@silaris.in":
	if(isset($_GET['cid']))
	{
		$cid = $_GET['cid'];
		$cst = "UPDATE `sc_ccrmdata` SET sc_c_action='1' WHERE sc_ccrmno='$cid'";
		$rst = mysqli_query($conn,$cst);
		if($rst == true)
		{
			header('Location:ccrm.php');
		}
	}
	break;
	case "pinaki.narendra@silaris.in":
	if(isset($_GET['cid']))
	{
		$cid = $_GET['cid'];
		$cst = "UPDATE `sc_ccrmdata` SET sc_a_action='1' WHERE sc_ccrmno='$cid'";
		$rst = mysqli_query($conn,$cst);
		if($rst == true)
		{
			header('Location:ccrm.php');
		}
	}
	break;
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
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="dis-menu">
						<h5 style="font-family:arial;color:#909198;text-align:center">CCRM FORMS</h5>
						<ul class="dis-file-menu">
							<?php
							
								$sql = "SELECT * FROM `sc_ccrmdata` WHERE `sc_status`='1' AND (`sc_informed_a`='$ademail' OR `sc_informed_c`='$ademail')";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									switch($ademail)
									{
									case "pinaki.narendra@silaris.in":
									if($row['sc_a_action'] == "0")
									{


									?>
									<li><a href="?ids=<?php echo $row['sc_ccrmno'];?>" class="font-weight-bold text-info"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_ccrmno'];?> <small>(<?php echo $row['sc_porocessowner'];?>)</small></a></li>
									<?php
								}
								else
								{
									?>
									<li><a href="?ids=<?php echo $row['sc_ccrmno'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_ccrmno'];?> <small>(<?php echo $row['sc_porocessowner'];?>)</small></a></li>
									<?php
								}
									break;
									case "rajesh.bisht@silaris.in":
									if($row['sc_c_action'] == "0")
									{


									?>
									<li><a href="?ids=<?php echo $row['sc_ccrmno'];?>" class="font-weight-bold text-info"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_ccrmno'];?> <small>(<?php echo $row['sc_porocessowner'];?>)</small></a></li>
									<?php
								}
								else
								{
									?>
									<li><a href="?ids=<?php echo $row['sc_ccrmno'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_ccrmno'];?> <small>(<?php echo $row['sc_porocessowner'];?>)</small></a></li>
									<?php
								}
									break;
									
								}
							}
							?>
							
						</ul>
					</div>
				</div>

				<div class="col-lg-9 col-md-9">

					<div class="dis-file-view">

						
	<?php
		if(isset($_GET['ids']))
		{
			$ids = $_GET['ids'];
			$sql = "SELECT * FROM `sc_ccrmdata` WHERE sc_ccrmno='$ids'";
			$res = mysqli_query($conn,$sql);
			$ret = mysqli_fetch_array($res);
			?>
<table class="table table-bordered">
			<tr class="font-weight-bold">
				<td>Priority</td>
				<td>CCR Number</td>
				<td>CCR Date & Time</td>
				<td>Type of Change</td>
				
			</tr>
			
			<tr>
				<td><?php echo $ret['sc_priority'];?></td>
				<td><?php echo $ret['sc_ccrmno'];?></td>
				<td><?php echo $ret['sc_ccrmdate'];?></td>
				<td><?php echo $ret['sc_typeofchange'];?></td>
				

			</tr>
		</table>
		<br>
		
		<table class="table table-bordered">
			<tr>
				<td>Location</td>
				<td><?php echo $ret['sc_location'];?></td>
			</tr>
			<tr>
				<td>Description of Change</td>
				<td><?php echo $ret['sc_description'];?></td>
			</tr>
			<tr>
				<td>Nature of Change</td>
				<td><?php echo $ret['sc_natureofchange'];?></td>
			</tr>
			<tr>
				<td>Start Date & Time</td>
				<td><?php echo $ret['sc_startdate'];?></td>
			</tr>
			<tr>
				<td>Expected Date & Time</td>
				<td><?php echo $ret['sc_expectedate'];?></td>
			</tr>
			<tr>
				<td>Information Security Impact</td>
				<td><?php echo $ret['sc_ismsimpact'];?></td>
			</tr>
			<tr>
				<td>Possible Impact Detail</td>
				<td><?php echo $ret['sc_possibleimpact'];?></td>
			</tr>
			<tr>
				<td>Security Impact Approved By</td>
				<td><?php echo $ret['sc_ismsapprove'];?></td>
			</tr>
			<tr>
				<td>Purpose for the changes</td>
				<td><?php echo $ret['sc_purposeofchange'];?></td>
			</tr>
			<tr>
				<td>Process Owner</td>
				<td><?php echo $ret['sc_porocessowner'];?></td>
			</tr>
			<tr>
				<td>Owner</td>
				<td><?php echo $ret['sc_owner'];?></td>
			</tr>
		</table>
<br>

<table class="table table-bordered">
	<tr>
		<td><?php echo $ret['sc_fulldescription'];?></td>
	</tr>
</table>
<br>
<table class="table table-bordered">
	<tr>
		<td>Will this change cause an outage to customer/business?</td>
		<td><?php echo $ret['sc_custmbusiness'];?></td>
	</tr>
	<tr>
		<td>Regression procedure (In case of failure due to changes made)</td>
		<td><?php echo $ret['sc_regression'];?></td>
	</tr>
	<tr>
		<td>Required time to back out</td>
		<td><?php echo $ret['sc_backout'];?></td>
	</tr>
	<tr>
		<td>Potential Impact if the change fails</td>
		<td><?php echo $ret['sc_potenial'];?></td>
	</tr>
	<tr>
		<td>Proposed change conflicting with any other planned change for the same day</td>
		<td><?php echo $ret['sc_conflicting'];?></td>
	</tr>
</table>
<br>
<?php
switch($ademail)
	{
		case "rajesh.bisht@silaris.in":
		if($ret['sc_c_action'] == "0")
		{
		?>
<table class="table">
	<tr>
		<td><a href="?cid=<?php echo $ids?>" class='btn btn-info float-right'>Approve</a></td>
	</tr>
		
</table>
		<?php
		}
		break;
		case "pinaki.narendra@silaris.in":
		if($ret['sc_a_action'] == "0")
		{
			?>
			<table class="table">
	<tr>
		<td><a href="?cid=<?php echo $ids?>" class='btn btn-info float-right'>Approve</a></td>
	</tr>
		
</table>
			<?php
		break;
		}
	}


								}

								else
								{
									echo "<span class='text-secondary'>Data Table</span>";
								}
							?>
							
						
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
include('footer.php');
?>