<?php
include('header.php');
include_once("../emailconfig.php");
?>




<?php
if(isset($_POST['emailacess']))
{

	$empname = $_POST['empname'];
	$prefix = $_POST['prefix'];
	$empd = strtoupper($_POST['empid']);
	$empid = $prefix.$empd;
	$process = $_POST['process'];
	$empemail = $_POST['empemail'];
	$desigtn = $_POST['desigtn'];
	$reporting = $_POST['reporting'];

	$opids = htmlspecialchars($_POST['opids']);
	$itismsids = htmlspecialchars($_POST['itismsids']);
	$adminids = htmlspecialchars($_POST['adminids']);
	$tainerids = htmlspecialchars($_POST['tainerids']);
	$externalids = htmlspecialchars($_POST['externalids']);
	


	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');
	

	
	$csql = "INSERT INTO `sc_emailcreation`(`sc_empname`, `sc_empid`, `sc_process`, `sc_designation`,`sc_suggestemail`, `sc_reportingto`, `sc_oprationids`, `sc_itismsids`, `sc_adminids`, `sc_trainerids`, `sc_externalids`, `sc_status`, `sc_action`, `sc_createdon`, `sc_createdby`, `sc_createdemail`) VALUES ('$empname','$empid','$process','$desigtn','$empemail','$reporting','$opids','$itismsids','$adminids','$tainerids','$externalids','1','5','$daytime','$adname','$ademail')";
	$cres = mysqli_query($conn,$csql);


		$mail->addAddress('email.support@silaris.in', 'Arun Dogra');
		$mail->addCC($ademail,$adname);
		$mail->Subject = 'Exist Email Access';
    	$mail->Body.= 'Hi Email Support Team, <br> Employee has send request for email access, please give previous access detail of below mention email ID . for reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
		$mail->Body.='<th>Email ID</th>';
    	$mail->Body.='<th>Process</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$empname.'</td>';
    	$mail->Body.='<td>'.$empid.'</td>';
		$mail->Body.='<td>'.$empemail.'</td>';
    	$mail->Body.='<td>'.$process.'</td>';
    	$mail->Body.='<td>'.$desigtn.'</td>';
		$mail->Body.='<td>'.$reporting.'</td>';
    	$mail->Body.='<td>'.$opids.$itismsids.$adminids.$tainerids.$externalids.'</td>';
    	$mail->Body.='<td>To be filled by IT Dept:</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	//$mail->Body.='Please confirm, Is employee exist or not in Portal';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	

		if($cres == true AND $mail->send())
		{
			header('Location:exist-access.php');
		}
		else
        {
        	echo "<script>alert('Wrong Data!')</script>";
        }
	
		




}

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
			<div class="row mb-4">
				
				<div class="col-lg-12 col-md-12">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Assign Session </button>
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Batch No.</td>
						<td>Trainee Name</td>
						<td>Process / Dept.</td>
						<td>Designation</td>
              			<td>Date</td>
              			<td>Time</td>
              			<td>Remarks</td>
              			
						<td>Status</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_batch_trainee`";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
									<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['trainee_batch_id'];?></td>
                                    <td><?php echo $trow['trainee_name'];?></td>
                                    <td><?php echo $trow['trainee_process'];?></td>
                                    <td><?php echo $trow['trainee_designation'];?></td>
                                    
									<td><?php echo $trow['session_date'];?></td>
                                    <td><?php echo $trow['session_time'];?></td>
                                    <td><?php echo $trow['remarks'];?></td>
                                   
                                    <td><?php echo $trow['status']==0?"Pending":"Updated"?></td>

                                    
                                    
                                    	
							 	 										
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