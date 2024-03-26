<?php
include('header.php');
?>
<?php
if(isset($_POST['desubt']))
{
	
	
	$fulname = $_POST['fulname'];
	$empid = $_POST['empid'];
	$empdid = "SIPLIND".$empid;
	$process = $_POST['process'];
	$design = $_POST['design'];
	
	$issuedate = $_POST['issuedate'];
	
	$extrahar = $_POST['extrahar'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	
		$csql = "INSERT INTO `sc_wfhdesktop`(`sc_empid`, `sc_empname`, `sc_emdpost`, `sc_process`, `sc_assests`, `sc_createdon`, `sc_action`, `sc_status`, `sc_issuedate`) VALUES ('$empdid','$fulname','$design','$process','$extrahar','$daytime','0','1','$issuedate')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:wfh-desktop.php');
		}
	


}

?>
<?php
if(isset($_GET['ctd']))
{
	$ctd = $_GET['ctd'];
	$clt ="UPDATE `sc_laptop` SET sc_status='0' WHERE sc_sno='$ctd'";
	$rlt = mysqli_query($conn,$clt);
	if($rlt == true)
    {
    	header('Location:desktop-details.php');
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
				<div class="col-lg-6 col-md-6">
              <a href="data-laptop.php" class="btndownload"><i class="fa fa-download"></i> Data Export</a>
              </div>
				<div class="col-lg-6 col-md-6">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Data Entry</button>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
              			
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Designation</td>
						<td>Process</td>
						<td>Issue Date</td>
						<td>Assets Details</td>
						<td>Return/Edit</td>
              			<td>ACTION</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_wfhdesktop` WHERE sc_status='1'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
                                    <td><?php echo $trow['sc_emdpost'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
                                    <td><?php echo $trow['sc_issuedate'];?></td>
                                    <td><?php echo $trow['sc_assests'];?></td>
                                    
                                    <td><a href="wfh-details.php?etd=<?php echo $trow['sc_sno'];?>" class="blred">Edit/Return</a></td>
                                    <td><a href="?ctd=<?php echo $trow['sc_sno'];?>" class="blred">Delete</a></td>
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
	<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
                        <label>Employee ID</label>
                    <input type="number" name="empid" class="form-control" required> 
					
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Full Name</label>
				<input type="text" name="fulname" class="form-control">
				</div>

				
			</div>
			
             <div class="form-group row">
                        <div class="col-lg-6 col-md-6">
					   
					<label>Designation</label>
				<input type="text" name="design" class="form-control" required>
				
				</div>
				<div class="col-lg-6 col-md-6">
                        <label>Process</label>
                        <select name="process" class="form-control" required>
                        <option value="" selected="" disabled="">Select Process</option>
                        <?php
                        	$ct = "SELECT * FROM `sc_process`";
                            $st = mysqli_query($conn,$ct);
                            while($rw = mysqli_fetch_array($st))
                            {
                            	?>
                                <option value="<?php echo $rw['sc_process'];?>"><?php echo $rw['sc_process'];?></option>
                                <?php
                            }
                        ?>
                        </select>
				</div>
				
				
			</div>
               <div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Issue Date</label>
                    <input type="date" name="issuedate" class="form-control" required> 
				</div>
	
			</div> 
                       
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Extra Notes</label>
					<textarea name="extrahar" class="form-control"></textarea>
				
				</div>
	
			</div>
			
			<div class="form-group">
				<input type="submit" name="desubt" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>