<?php
include('header.php');
?>
<?php
if(isset($_POST['desubt']))
{
	$ctd = $_GET['ctd'];
	$location = $_POST['build'];
	
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

		$csql = "UPDATE `sc_desktop` SET `sc_location`='$location', `sc_department`='$depart', `sc_process`='$process', `sc_subprocess`='$subprocess', `sc_wrokstation`='$workstsn', `sc_systemsno`='$noofsystem', `sc_workingsystem`='$wrkingsystm', `sc_notworking`='$notwrksystm', `sc_processmanger`='$manager', `sc_extrahardware`='$extrahar', `sc_createdon`='$daytime', `sc_createdby`='$adname' WHERE sc_sno='$ctd'";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
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
<div class="internaledit">
	<?php
		if(isset($_GET['ctd']))
		{
			$ctd = $_GET['ctd'];
			$mtd = "SELECT * FROM `sc_desktop` WHERE sc_sno='$ctd'";
			$rtd = mysqli_query($conn,$mtd);
			$rwo = mysqli_fetch_array($rtd);
		}
	?>
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Location</label>
				
                <input type="text" name="build" value="<?php echo $rwo['sc_location'];?>" class="form-control">
				</div>
				

				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Department</label>
				<input type="text" name="depart" class="form-control" value="<?php echo $rwo['sc_department'];?>">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Name of Manager</label>
                    <input type="text" name="manager" class="form-control" value="<?php echo $rwo['sc_processmanger'];?>">    
					
				
				</div>
				
			</div>
             <div class="form-group row">
				<div class="col-lg-4 col-md-4">
					<label>Process</label>
                        <select name="process" class="form-control" >
                        <option value="<?php echo $rwo['sc_process'];?>" selected=""><?php echo $rwo['sc_process'];?></option>
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
				<div class="col-lg-4 col-md-4">
					<label>Sub Process</label>
                       
					<select name="subprocess" class="form-control" >
                        <option value="<?php echo $rwo['sc_subprocess'];?>" selected=""><?php echo $rwo['sc_subprocess'];?></option>
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
				<div class="col-lg-4 col-md-4">
					<label>Work Stations</label>
				<input type="number" name="workstsn" class="form-control" value="<?php echo $rwo['sc_wrokstation'];?>">
				</div>
				
			</div>
                        <div class="form-group row">
				
				<div class="col-lg-4 col-md-4">
					<label>No of Systems</label>
                    <input type="number" name="noofsystem" class="form-control" value="<?php echo $rwo['sc_systemsno'];?>">    
					
				
				</div>
                      
				<div class="col-lg-4 col-md-4">
					<label>Working Systems</label>
				<input type="number" name="wrkingsystm" class="form-control" value="<?php echo $rwo['sc_workingsystem'];?>">
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Not Working Systems</label>
                    <input type="number" name="notwrksystm" class="form-control" value="<?php echo $rwo['sc_notworking'];?>">    
					
				
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Extra Hardware</label>
					<textarea name="extrahar" class="form-control" value="<?php echo $rwo['sc_extrahardware'];?>"></textarea>
				
				</div>
	
			</div>
			
			<div class="form-group">
				<input type="submit" name="desubt" class="btn btn-info" value="Update">
				
			</div>
		</form>
	</div>


<?php
include('footer.php');
?>
