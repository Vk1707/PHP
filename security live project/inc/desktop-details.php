<?php
include('header.php');
?>
<?php
if(isset($_POST['desubt']))
{
	
	$build = $_POST['build'];
	$loc = $_POST['loc'];
	$location = $build.$loc;
	$depart = $_POST['depart'];
	$manager = $_POST['manager'];
	$process = $_POST['process'];
	$subprocess = $_POST['subprocess'];
	$workstsn = $_POST['workstsn'];
	$noofsystem = $_POST['noofsystem'];
	$wrkingsystm = $_POST['wrkingsystm'];
	$notwrksystm = $_POST['notwrksystm'];
	$extrahar = $_POST['extrahar'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	
		$csql = "INSERT INTO `sc_desktop`( `sc_location`, `sc_department`, `sc_process`, `sc_subprocess`, `sc_wrokstation`, `sc_systemsno`, `sc_workingsystem`, `sc_notworking`, `sc_processmanger`, `sc_extrahardware`, `sc_createdon`, `sc_createdby`, `sc_status`) VALUES ('$location','$depart','$process','$subprocess','$workstsn','$noofsystem','$wrkingsystm','$notwrksystm','$manager','$extrahar','$daytime','$adname','1')";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:desktop-details.php');
		}
	


}

?>
<?php
if(isset($_GET['ctd']))
{
	$ctd = $_GET['ctd'];
	$clt ="UPDATE `sc_desktop` SET sc_status='0' WHERE sc_sno='$ctd'";
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
              <a href="data-desktop.php" class="btndownload"><i class="fa fa-download"></i> Data Export</a>
              </div>
				
				<div class="col-lg-6 col-md-6">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Data Entry</button>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
              			<td>Date || Time</td>
						<td>LOCATION</td>
						<td>DEPARTMENT</td>
						<td>PROCESS</td>
						<td>SUB PROCESS</td>
						<td>NO OF WORK STATIONS</td>
						<td>NO OF SYSTEMS</td>
						<td>SYSTEMS WORKING</td>
						<td>SYSTEMS NOT WORKING</td>
						<td>PROCESS MANAGER</td>
						<td>EXTRA HARDWARE</td>
						<td>Edit</td>
              			<td>ACTION</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_desktop` WHERE sc_status='1' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_location'];?></td>
                                    <td><?php echo $trow['sc_department'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
                                    <td><?php echo $trow['sc_subprocess'];?></td>
                                    <td><?php echo $trow['sc_wrokstation'];?></td>
                                    <td><?php echo $trow['sc_systemsno'];?></td>
                                    <td><?php echo $trow['sc_workingsystem'];?></td>
                                    <td><?php echo $trow['sc_notworking'];?></td>
                                    <td><?php echo $trow['sc_processmanger'];?></td>
                                    <td><?php echo $trow['sc_extrahardware'];?></td>
                                    <td><a href="desktop-edit.php?ctd=<?php echo $trow['sc_sno'];?>" class='netwlt'>Edit</a></td>
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
					<label>Building No</label>
				<select class="form-control" name="build" required>
                        <option value="" selected="" disabaled="">Select Building</option>
                        <option value="14/1">14/1</option>
                        <option value="14/2">14/2</option>
                        <option value="14/3">14/3</option>
                        <option value="A-6">A-6</option>
                        <option value="A-7">A-7</option>
                        <option value="A-1">A-1</option>
                </select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Location</label>
				<select class="form-control" name="loc" required>
                        <option value="" selected="" disabaled="">Select Building</option>
                        <option value="Basement">Basement</option>
                        <option value="Groundfloor">Groundfloor</option>
                        <option value="Firstfloor">Firstfloor</option>
                        <option value="Secondfloor">Secondfloor</option>
                        <option value="Thirdfloor">Thirdfloor</option>
                        
                </select>
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Department</label>
				<input type="text" name="depart" class="form-control">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Name of Manager</label>
                    <input type="text" name="manager" class="form-control" required>    
					
				
				</div>
				
			</div>
             <div class="form-group row">
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
				<div class="col-lg-6 col-md-6">
					<label>Sub Process</label>
                       
					<select name="subprocess" class="form-control" required>
                        <option value="" selected="" disabled="">Select Sub Process</option>
                        <?php
                        	$ct = "SELECT * FROM `sc_sbprocess`";
                            $st = mysqli_query($conn,$ct);
                            while($rw = mysqli_fetch_array($st))
                            {
                            	?>
                                <option value="<?php echo $rw['sc_sbprocess'];?>"><?php echo $rw['sc_sbprocess'];?></option>
                                <?php
                            }
                        ?>
                        </select>
				
				</div>
				
			</div>
                        <div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Work Stations</label>
				<input type="number" name="workstsn" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>No of Systems</label>
                    <input type="number" name="noofsystem" class="form-control" required>    
					
				
				</div>
                        </div>
                        <div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Working Systems</label>
				<input type="number" name="wrkingsystm" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Not Working Systems</label>
                    <input type="number" name="notwrksystm" class="form-control" required>    
					
				
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Extra Hardware</label>
					<textarea name="extrahar" class="form-control" required></textarea>
				
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