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
              <div class="row pb-3">
              	<div class="col-lg-6 col-md-6"><a href="ccrm-history.php" class="btn btn-info"><i class="fa fa-history"></i> History</a></div>
              	<div class="col-lg-6 col-md-6"></div>
              </div>
              
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
              			<tr>
              				<td>S.No</td>
              				<td>Priority</td>
              				<td>CCR Number</td>
              				<td>CCR Date & Time</td>
              				<td>Type of Change</td>
              				<td>Process Owner</td>
              				<td>Action</td>
              			</tr>
              		</thead>
              		<tbody>
              <?php
              	$numt = 1;
				$sql = "SELECT * FROM `sc_ccrmdata` WHERE `sc_status`='1' AND (`sc_informed_a`='$ademail' OR `sc_informed_c`='$ademail')";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($res))
				{
                	
                ?>
                <tr>
                <td><?php echo $numt;?></td>
                <td><?php echo $row['sc_priority'];?></td>
                <td><?php echo $row['sc_ccrmno'];?></td>
                <td><?php echo $row['sc_ccrmdate'];?></td>
                <td><?php echo $row['sc_typeofchange'];?></td>
                <td><?php echo $row['sc_porocessowner'];?></td>
                <td><?php echo $row['sc_priority'];?></td>
                </tr>
                <?php
                $numt++;
                   
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