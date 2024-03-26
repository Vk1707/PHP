<?php
include('header.php');
include_once("../emailconfig.php");


?>
 <?php



    if (isset($_POST['add_batch'])) {

        $batch_id = "";
        $batch_name = "";

        $batch_department = $_POST['process'];
        $batch_trainer_name = $_POST['team_leader'];
		$btach_location = $_POST['location'];

        $qry = "SELECT * FROM `sc_batch`";
        $qry_run = $conn->query($qry);
        if (mysqli_num_rows($qry_run) > 0) {

            $qry_batch = "SELECT MAX(batch_id) as maxID FROM `sc_batch`";
            $qry_batch_run = $conn->query($qry_batch);

            $last_data = mysqli_fetch_assoc($qry_batch_run);


            $batch_id = $last_data['maxID'] + 1;
            $batch_name = "Batch-" . $batch_id;
            $sql = "INSERT INTO `sc_batch`(`batch_name`, `batch_id`, `batch_trainer_name`, `batch_department`,`created_by`,`btach_location`) VALUES ('$batch_name','$batch_id','$batch_trainer_name','$batch_department','$_SESSION[ademail]','$btach_location')";
            $sql_run = $conn->query($sql);
        
        if($sql_run){
        header("location:isms-test-request.php");
        }
        } else {
            $batch_id = 1000;
            $batch_name = "Batch-" . $batch_id;

            $sql = "INSERT INTO `sc_batch`(`batch_name`, `batch_id`, `batch_trainer_name`, `batch_department`,`btach_location`) VALUES ('$batch_name','$batch_id','$batch_trainer_name','$batch_department','$btach_location')";
            $sql_run = $conn->query($sql);
        }
    }


    ?>

 <?php
                        
                        
                        
    if (isset($_POST['add_trainee'])) {
    
    print_r($_POST);

        $tranee_btch=$_POST['batch_name'];
        $trainee_process = $_POST['process'];
        $trainee_name = $_POST['trainee_name'];
        $trainee_desigtnation = $_POST['desigtnation'];
    	
        $trainee_type = $_POST['manager'];
        $trainee_doj = $_POST['doj'];
    


       
            $sql = "INSERT INTO `sc_batch_trainee`(`trainee_batch_id`, `trainee_name`, `trainee_process`, `trainee_designation`, `trainee_doj`, `trainee_type`) VALUES ('$tranee_btch','$trainee_name','$trainee_process','$trainee_desigtnation','$trainee_doj','$trainee_type')";
            $sql_run = $conn->query($sql);
    
    if($sql_run){

    
    echo '
     <script>
    window.location.href="./add-trainee.php";
    </script>
    
    ';
    
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
			        <a class="nav-link" target="_blank" href="excel/isms-employee-data-formate.csv">Employee Format (Upload Only CSV File)</a>
			      </li>
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
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Add Batch</button>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						
							<td>Trainer Name</td>
              				<td>Batch Name</td>
							<td>Process / Dept.</td>
              				<td>Date</td>
              				<td>Batch Location</td>
							<td>Action</td>
              				
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_batch` WHERE created_by='$_SESSION[ademail]'  ORDER BY batch_name DESC" ;
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['batch_trainer_name'];?></td>
                                    <td><a href="view-isms-details.php?batch=<?php echo $trow['batch_id']?>"><?php echo $trow['batch_name'];?></a></td>
                                    <td><?php echo $trow['batch_department'];?></td>
                                    <td><?php echo $trow['created_date'];?></td>
                                    <td><?php echo $trow['btach_location'];?></td>
									<td><a class="btndanger" href="./add-trainee-details.php"> <i class="fa fa-user-plus"> </i> Add Details</a></td>
                                    
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
					<label>Date</label>
					<input type="text" name="access_date" class="form-control" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
				</div>
               
			</div>
			<div class="form-group row">
                <div class="col-lg-4 col-md-6">
					<label>Trainer Name/Instructor Name</label>
				<input type="text" name="team_leader" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-6">
					<label>Process / Dept.</label>
				<input type="text" name="process" class="form-control" required>
				</div>
                <div class="col-lg-4 col-md-6">
					<label>Building No. / Location</label>
				<input type="text" name="location" class="form-control" required>
				</div>
			</div>
          
          
			<div class="form-group">
				<input type="submit" name="add_batch" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<div class="internal-form" id="internal1">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Batch No.</label>
					<select name="batch_name" class="form-control" required>
						<option value="" disabled="" selected="">Select Existing Batch</option>
                        <?php
                       $qry_batch= "SELECT * FROM `sc_batch`";
						$qry_batch_run= $conn->query($qry_batch);
							if(mysqli_num_rows($qry_batch_run)>0){
                            
                            while($batch_data=mysqli_fetch_assoc($qry_batch_run)){ ?>
                            <option value="<?php echo $batch_data['batch_id'] ?>"><?php echo $batch_data['batch_name'] ?></option>
                            
                            
                           <?php  }
                            
                            }

                        
                        ?>
					</select>
				</div>
                <div class="col-lg-6 col-md-6">
					<label>Trainee Name</label>
				<input type="text" name="trainee_name" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				
				<div class="col-lg-4 col-md-6">
					<label>Process / Dept.</label>
					<input type="text" name="process" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-6">
					<label>Designation</label>
				<input type="text" name="desigtnation" class="form-control" required>
				</div>
                <div class="col-lg-4 col-md-6">
					<label>Date of Joining</label>
				<input type="date" name="doj" class="form-control" required>
				</div>
			</div>
            
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Employee Type</label>
					<select name="manager" class="form-control" required>
						<option value="" disabled="" selected="">Select Employee Type</option>
                        <option value="nht">NHT</option>						
						<option value="rejoin">Rejoin</option>
						<option value="refresher">Refresher</option>
					</select>
				</div>	
                <div class="col-lg-6 col-md-6">
					<label>Upload File </label>
					<input type="file"  name="filename" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" name="add_trainee" class="btn btn-dark" value="Submit">
				<button id="closeform1" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>