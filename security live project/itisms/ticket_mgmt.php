<?php
include('header.php');
include ('../emailconfig.php');
date_default_timezone_set('Asia/Kolkata');
?>

<?php
if(isset($_POST['ticket_set']))
{
	
	$sql = "SELECT * FROM isms_ticket";
	$res = mysqli_query($conn,$sql);
	$count= mysqli_num_rows($res);
	if ($count == 0)
	{
		$sr_no = 1;
		$dd=date('dmY');
		$ticket_no = "TN".$dd."00".$sr_no;
			}
	else
	{
		$sr_no= $count+1;
		$dd=date('dmY');
		$ticket_no = "TN".$dd."00".$sr_no;
			}
	
	$raised_date = $_POST['raised_on_date'];
	$tn = $_POST['ticket_no'];
	$process_name = $_POST['process_name'];
	$md = $_POST['main_disposition'];
	$sd = $_POST['sub_disposition'];
	$pr = $_POST['problem'];
	$p = $_POST['priority'];
	
	$assign_to = $_POST['assigned_to'];
	$mobile=$_POST['mobile_no'];
	
	$web = "INSERT INTO `isms_ticket`(`sr_no`, `ticket_no`, `ticket_gen_date`, `process_name`, `main_disposition`, `sub_disposition`, `ticket_task`, `mobile`, `priority`, `assigned_to`,`status`) VALUES ('$sr_no','$tn','$raised_date','$process_name','$md','$sd','$pr','$mobile','$p','$assign_to','open')";

		$wires = mysqli_query($conn,$web);
		if($wires == true)
		{
			echo "<script> alert('Information Saved Successfully!')</script>";
			
			$mail->addAddress('isms.backend@silaris.in','ISMS Backend');
			
			$mail->addCC('isms@silaris.in' ,'Tanay');
			$mail->Subject="Ticket Allocated to  ". $assign_to;
			$mail->Body="Dear  " .$assign_to. ", <br><br>

             A ticket has been assigned to you. Kindly login at http://isms.silaris.in to see details. <br> <br> <br> Thank You! <br> <br> <strong> Note: This is an auto generated mail.</strong>";

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
					<a href="ticket_history.php" class="btn btn-warning"><i class="fa fa-history"></i> History</a>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="clearfix">
				
							<button class="btn btn-info float-right" id="addform"> <i class="fa fa-ticket"> </i>Create Ticket</button>
							
					</div>
				</div>
									
			</div>
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<th>S.No</th>
						<th>Ticket No.</th>		
						<th>Ticket Raised On</th>
						<th>Process/Dept Name</th>
						<th>Main Disposition</th>
						<th>Sub Disposition</th>
						<th>Task/Problem</th>
						<th>Mobile No.</th>
						<th>Priority</th>
						<th>Assigned To</th>
						<th>Status</th>
						<th>Backend Feedback</th>				
						
						
					</thead>
					<tbody>
						<?php
              				
							
							$tsql = "SELECT * FROM `isms_ticket` WHERE status_bit='0' OR status_bit='2' order by sr_no desc";
							$tres = mysqli_query($conn,$tsql);
						    $num=1;
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['ticket_no'];?></td>
									<td><?php echo $trow['ticket_gen_date'];?></td>
									<td><?php echo $trow['process_name'];?></td>
									<td><?php echo $trow['main_disposition'];?></td>
									<td><?php echo $trow['sub_disposition'];?></td>
									<td><?php echo $trow['ticket_task'];?></td>
									<td><?php echo $trow['mobile'];?></td>
									<td><?php echo $trow['priority'];?></td>
									<td><?php echo $trow['assigned_to'];?></td>
									<?php 

									 $sb=$trow['status_bit'];
									 if ($sb=='0')
									    { ?>
									    	<td><?php echo "<span style='color:red; font-weight:bold'> OPEN"; ?></td>
									 <?php   }
									 else if ($sb=='1')
									    { ?>
									    	<td><?php echo "<span style='color:green; font-weight:bold'>CLOSED"; ?></td>
									   <?php   }
									 else if ($sb=='2')
									    { ?>
									    	<td><?php echo "<span style='color:orange; font-weight:bold'>HOLD"; ?></td>
									   <?php   } ?>

									   <td><?php echo $trow['hold_feedback'];?></td>
									  


									
						         </tr>
						    <?php 

						     $num++;

						 }  ?>
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
					<input type="text" name="raised_on_date" class="form-control" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
				</div>
			
			
			<?php
					
					$sql = "SELECT * FROM isms_ticket";
					$res = mysqli_query($conn,$sql);
					$count= mysqli_num_rows($res);
					if ($count == 0)
					{
						$sr_no = 1;
						$dd=date('dmY');
						$ticket_no = "TN".$dd."00".$sr_no;
					}
					else
						{
							$sr_no= $count+1;
							$dd=date('dmY');
							$ticket_no = "TN".$dd."00".$sr_no;
						}
			?>

			
				<div class="col-lg-6 col-md-6">
					<label>Ticket Number</label>
					<input type="text" name="ticket_no" class="form-control" value="<?php echo $ticket_no; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process/Department Name</label>
					<input type="text" name="process_name" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Main Disposition</label>
					<textarea name="main_disposition" class="form-control" required></textarea>
				</div>
				
			</div>

			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Sub Disposition</label>
					<textarea name="sub_disposition" class="form-control"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Task/Problem </label>
					<textarea name="problem" class="form-control" required></textarea>
					
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Priority</label>			
				<ul class="timep">

					<li>P1<input type="radio" name="priority" required value="P1"></li>
					<li>P2<input type="radio" name="priority" required value="P2"></li>
					<li>P3<input type="radio" name="priority" required value="P3"></li>
					<li>P4<input type="radio" name="priority" required value="P4"></li>
					
				</ul>

				</div>
				<div class="col-lg-6 col-md-6 ">
					<label>Ticket Assigned To</label>			
				
					  <select name="assigned_to" required>
					  	<option value="" hidden>Click to choose</option>
					    <option value="Vishal" >Vishal</option>
					    <option value="Mudit" >Mudit</option>
					    <option value="Amit" >Amit</option>
					    
					  </select>
			
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Mobile No.</label>

					<input type="text" name="mobile_no" class="form-control" maxlength="10">
				</div>
				
				
			</div>
			
			<div class="form-group text-center">
				<input type="submit" name="ticket_set" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>