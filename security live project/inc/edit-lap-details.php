<?php
include('header.php');
?>
<?php
if(isset($_POST['deupdate']))
{
	$etd = $_GET['etd'];
	
	$lapcat = $_POST['lapcat'];
	$fulname = $_POST['fulname'];
	$empid = strtoupper($_POST['empid']);
	$process = $_POST['process'];
	$design = $_POST['design'];
	$lapname = $_POST['lapname'];
	$lapserial = $_POST['lapserial'];
	$returndate = $_POST['issuedate'];
	$issuenote = $_POST['issuenote'];
	$returnnotes = $_POST['returnnotes'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	
		$csql = "UPDATE `sc_laptop` SET `sc_lapcategory`='$lapcat', `sc_fullname`='$fulname', `sc_empind`='$empid', `sc_emdpost`='$design', `sc_process`='$process', `sc_lapname`='$lapname', `sc_lapserialno`='$lapserial',`sc_returndate`='$returndate', `sc_issuenotes`='$issuenote', `sc_returnnotes`='$returnnotes', `sc_actions`='1',`sc_createdon`='$daytime' WHERE `sc_sno`='$etd'";
		$cres = mysqli_query($conn,$csql);
		if($cres == true)
		{
			header('Location:laptop-details.php');
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
             if(isset($_GET['etd']))
             {
             	$etd = $_GET['etd'];
             	$esql = "SELECT * FROM `sc_laptop` WHERE sc_sno='$etd'";
             	$eres = mysqli_query($conn,$esql);
             	$erow = mysqli_fetch_array($eres);
             $ecate = $erow['sc_lapcategory'];
             $ename = $erow['sc_fullname'];
             $eid = $erow['sc_empind'];
             $epost = $erow['sc_emdpost'];
             $epros = $erow['sc_process'];
             $elap = $erow['sc_lapname'];
             $eseril = $erow['sc_lapserialno'];
            
             $enotes = $erow['sc_issuenotes'];
            
             $ernote = $erow['sc_returnnotes'];
             
             ?>

	<div class="lap-form">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Laptop Category</label>
				<select class="form-control" name="lapcat">
                        <option value="<?php echo $ecate;?>" selected=""><?php echo $ecate;?></option>
                        <option value="Agent Level">Agent Level</option>
                        <option value="Support Staff GGN">Support Staff GGN</option>
                        <option value="Support Staff Naraina">Support Staff Naraina</option>
                        <option value="Internal Laptop Details">Internal Laptop Details</option>
                        
                        
                </select>
				
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Full Name</label>
				<input type="text" name="fulname" class="form-control" value="<?php echo $ename;?>">
				</div>

				
			</div>
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
                        <label>Employee ID</label>
                    <input type="text" name="empid" class="form-control" value="<?php echo $eid;?>"> 
					
				</div>
				<div class="col-lg-4 col-md-4">
					   
					<label>Designation</label>
				<input type="text" name="design" class="form-control" value="<?php echo $epost;?>">
				
				</div>
                        <div class="col-lg-4 col-md-4">
                        <label>Process</label>
                        <select name="process" class="form-control" >
                        <option value="<?php echo $epros;?>" selected=""><?php echo $epros;?></option>
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
                        <div class="col-lg-4 col-md-4">
					   
					<label>Laptop Name</label>
				<input type="text" name="lapname" class="form-control" value="<?php echo $elap;?>">
				
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Laptop Serial No</label>
				<input type="text" name="lapserial" class="form-control" value="<?php echo $eseril;?>">
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Return Date</label>
                    <input type="date" name="returndate" class="form-control">    
					
				
				</div>
                        </div>
                      
                       
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Issue Notes</label>
					<textarea name="issuenote" class="form-control" value="<?php echo $enotes;?>"></textarea>
				
				</div>
                        <div class="col-lg-6 col-md-6">
					<label>Return Notes</label>
					<textarea name="returnnotes" class="form-control" value="<?php echo $ernote;?>"></textarea>
				
				</div>
	
			</div>
                        
               
			
			<div class="form-group">
				<input type="submit" name="deupdate" class="btn btn-info" value="Update">
				
			</div>
		</form>
	</div>

             <?php
             
             }
             ?>
			
		</div>
	</div>


<?php
include('footer.php');
?>