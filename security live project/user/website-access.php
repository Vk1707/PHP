<?php
include('header.php');
include ('../emailconfig.php');
?>

<?php
if(isset($_POST['web_access']))
{
	$empname = $_POST['empname'];
	$process_name = $_POST['process_name'];
	$mngr_name = $_POST['mngr_name'];
	$mngr_id = $_POST['mngr_id'];
	$mngr_emailid = $_POST['mngr_emailid'];
	$avp_name = $_POST['avp_name'];
	$avp_emailid = $_POST['avp_emailid'];
	date_default_timezone_set('Asia/Kolkata');
	$accessdate = $_POST['access_date'];
	$website=$_POST['website'];
	$approval_file = $_FILES["approval"]["name"];

	$filetmp = $_FILES['approval']['tmp_name']; //temp_name will remain fixed
	$target_dir = "../uploads/";  
	$target_file = $target_dir . basename($_FILES["approval"]["name"]);// name will remain fixed
	
	

	move_uploaded_file($filetmp,$target_file);

	$sql = "SELECT * FROM website_access";
	$res = mysqli_query($conn,$sql);
	$count= mysqli_num_rows($res);
	if ($count == 0)
	{
		$sr_no = 1;
		$access_id = "WEB1";
	}
	else
		{
			$sr_no= $count+1;
			$access_id = "WEB".$sr_no;
		}
	


		$web = "INSERT INTO website_access(sr_no,access_id,process_manager_name,access_req_for,website_name,manager_emp_id,manager_email_id,process_name,avp_name,avp_emailid,request_date,client_approval_file, created_by) VALUES ('$sr_no','$access_id','$mngr_name', '$empname','$website','$mngr_id','$mngr_emailid','$process_name','$avp_name','$avp_emailid','$accessdate','$approval_file','$ademail')";
		
		$wires = mysqli_query($conn,$web);
		if($wires == true)
		{
			echo "<script> alert('Information Saved Successfully!')</script>";
			$mail->addAddress($avp_emailid,$avp_name);
			$mail->addAddress('isms@silaris.in','Tanay');
			$mail->addCC($mngr_emailid,$mngr_name);
			$mail->Subject="Website Access Request";
			$mail->Body="Dear Sir, <br>

            We have received a request for website link approval. Kindly login at http://isms.silaris.in  to give security clearance. <br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";

			$mail->send();
		}

		else
		{
			echo "<script> alert('Information Not Saved')</script>";
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
				<div class="col-lg-6 col-md-6">
					<a href="website-history.php" class="btn btn-warning"><i class="fa fa-history"></i> History</a>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="clearfix">
				
							<button class="btn btn-info float-right" id="addform"> <i class="fa fa-globe"> </i> Website Access Form</button>
							
					</div>
				</div>
									
			</div>
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Website_Access_ID</td>		
						<td>Created_On</td>
						<td>Created By</td>
						<td>Process / Dept.</td>
						<td>Access Required For</td>
						<td>Process Manager Employee Id </td>
						<td>Process Manager Email Id</td>
						<td>Process AVP Name</td>
						<td>Process AVP Email Id</td>
						<td>Website Requested</td>
						<td>Client Approval File</td>				
						<td>ISMS Feedback</td>
						<td>CEO Feedback</td>
						<td>Whitelisting Status</td>
					
						
					</thead>
					<tbody>
						<?php
              				
							$email=$_SESSION['ademail'];
							$tsql = "SELECT * FROM `website_access` WHERE (manager_email_id='$email') AND ((isms_status='0' OR isms_status='3') OR (isms_status='1' AND ceo_status='0') OR (isms_status='1' AND ceo_status='1' AND network_status='0')) order by access_id desc";
							$tres = mysqli_query($conn,$tsql);
							$num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['access_id'];?></td>
									<td><?php echo $trow['request_date'];?></td>
									<td><?php echo $trow['process_manager_name'];?></td>
									<td><?php echo $trow['process_name'];?></td>
									<td><?php echo $trow['access_req_for'];?></td>
									<td><?php echo $trow['manager_emp_id'];?></td>
									<td><?php echo $trow['manager_email_id'];?></td>
									
									<td><?php echo $trow['avp_name'];?></td>
									<td><?php echo $trow['avp_emailid'];?></td>
									<td><?php echo $trow['website_name'];?></td>
									<?php $filename= $trow['client_approval_file'];?>
									<td> 

										<?php if(empty($filename))
										{
											echo "No file attached";
										}
										 
										else if (isset($filename))
										{echo "<a href= '../uploads/$filename'> Show </a> ";}
										?>
											
										</td>
									
									<td><?php
									$hrid = $trow['isms_status']; 
										if($hrid == "0")
										{
											echo "Pending";
										}
										else if($hrid == "1")
										{
											echo "Approved";
										}
										else if($hrid == "2")
										{
											echo "Rejected <br>";
											echo "Reason: ".$trow['isms_reason'];
											$filename=$trow['isms_rejection_file'];
											
											if(empty($filename))
										    {
											echo "No file attached";
										     }
										 
											else if (isset($filename))
										    {
											echo "<a href='../uploads/$filename'> View </a>";		
											

										     }
										 }
									   else if($hrid == "3")
										{
											echo "On Hold";?>
											<a href="website_request_again.php?id=<?php echo $trow['access_id']; ?>"> Request Again </a><?php


										}
									
									
									?></td>
									<td><?php
									if ($trow['isms_status']=='1')
									{
									$proav = $trow['ceo_status']; 
										if($proav == "0")
										{
											echo "Pending";
										}
										else if($proav == "1")
										{
											echo "Approved";
										}
									
										else if($proav == "2")
										{
											echo "Rejected";
										}
										else if($proav == "3")
										{
											echo "On Hold";?>
											<a href="website_request_again.php?id=<?php echo $trow['access_id']; ?>"> Request Again </a>
											<?php
										}
									}
									
									?></td>
									
									
									<td><?php
									if ($trow['isms_status']=='1' AND $trow['ceo_status']=='1')
									{
									$act = $trow['network_status']; 
										if($act == "0")
										{
											echo "Pending";
										}
										else if($act == "1")
										{
											echo "Whitelisted";
										}
										else if($act == "2")
										{
											echo "Not Whitelisted";
										}
									}
									
									
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
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>Access Required for Entire Domain or Particular Person? If required for particular person then please mention Name, Designation and Email Id </label>
					<textarea name="empname" class="form-control" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process Name</label>
					<input type="text" name="process_name" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Name</label>
					<input type="text" name="mngr_name" class="form-control" required>
				</div>
				
			</div>

			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Employee Id</label>
					<input type="text" name="mngr_id" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Email Id</label>
					<input type="email" name="mngr_emailid" class="form-control" required>
					
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>AVP Name</label>
					<input type="text" name="avp_name" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>AVP Email Id</label>			
					<input type="email" name="avp_emailid" class="form-control" required>
			
				</div>
				
			</div>
			<div class="form-group row">
				
				<div class="col-lg-6 col-md-6">
					<label>Website/ Link Name</label>
					<textarea rows="4" cols="20" name="website" class="form-control" required></textarea>
				</div>

				<div class="col-lg-6 col-md-6">
					<label>Client Approval File  (if any)</label>
					<input type="file" name="approval" class="btn btn-info" value="Attach File" >
				</div>

				
			</div>
			
			<div class="form-group text-center">
				<input type="submit" name="web_access" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>