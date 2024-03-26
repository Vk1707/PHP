<?php
include('header.php');
include_once("../emailconfig.php");
?>

	
<?php 
                        if(isset($_POST['backend_submit'])){
                        

                        
                        $sql_up= "UPDATE `sc_batch_trainee` SET session_update_pr='$_POST[backend_name]',remarks='$_POST[backend_remark]',session_date='$_POST[backend_date]',session_time='$_POST[backend_time]' WHERE trainee_batch_id='$_POST[batch_name]'";
                        
                        $sql_run= $conn->query($sql_up);
                        if($sql_run){
                        echo '<script>
                        
                        window.location.href="./isms-test-request-view.php";
                        </script>';
                        
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
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Trainer Name</td>
              				<td>Batch Name</td>
						<td>Process / Dept.</td>
              				<td>Date</td>
							<td>Status</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_batch` ORDER BY batch_name DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['batch_trainer_name'];?></td>
                                    <td><a href="assigned-session-employee.php?batch=<?php echo $trow['batch_id']?>"><?php echo $trow['batch_name'];?></a></td>
                                    <td><?php echo $trow['batch_department'];?></td>
                                    <td><?php echo $trow['created_date'];?></td>
									<td><?php  
                                    
                                    echo $trow['status']==0 ?"Not Assign" : "Assigned";
                                    
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
					<label>Date</label>
					<input type="text" name="access_date" class="form-control" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
				</div>
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
			</div>
                        

			<div class="form-group row">
                <div class="col-lg-6 col-md-6">
					<label>Your Name</label>
				<input type="text" name="backend_name" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Remarks</label>
				<input type="text" name="backend_remark" class="form-control" required>
				</div>
			</div>
          	<div class="form-group row">
                <div class="col-lg-6 col-md-6">
					<label>Date</label>
				<input type="date" name="backend_date" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Time</label>
				<input type="time" name="backend_time" class="form-control" required>
				</div>
			</div>
          
			<div class="form-group">
				<input type="submit" name="backend_submit" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
                     
		</form>
	</div>
</div>
              
                                 
                        

<?php
include('footer.php');
?>