<?php
include('header.php');
include ('../emailconfig.php');

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
			
			<form class="" method="POST" action="">
			
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label><strong>Please Enter your Name:</strong></label>
					<select class="selectpicker" name="exec_name" required>
					  	<option value="" hidden>Click to choose</option>
					    <option value="Vishal" >Vishal</option>
					    <option value="Mudit" >Mudit</option>
					    <option value="Amit" >Amit</option>
					    
					  </select>

					  <input type="submit" name="go" value="GO" class="btn btn-info" >
			
				</div>
			</div>
		</form>
				
			

		<?php

		if (isset($_POST['go']))
		{
			 if($_POST['exec_name']=="Vishal")
			 {

			 ?>

			 <div class="body-dash ">
			<div class="row mb-4">
				<div class="col-lg-6 col-md-6">
					
				</div>
				<div class="col-lg-6 col-md-6">
					
				
							<a href="ticket_history.php?id=<?php echo $_POST['exec_name'] ?>" class="btn btn-warning float-right"><i class="fa fa-history"></i> History</a>
							
					
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
						<th>Current Status</th>
						<th>Update Status</th>
								
						
						
					</thead>
					<tbody>
						<?php
              				
							
							$tsql = "SELECT * FROM `isms_ticket` WHERE  assigned_to='vishal' AND (status_bit='0' OR status_bit='2') order by sr_no desc";
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

									  
									   <td><a href="status_update.php?id=<?php echo $trow['ticket_no'] ?> ">Click to Update</a> </td>
									  


									
						         </tr>
						    <?php 

						     $num++;

						 }  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
include('footer.php');

	}

	else if($_POST['exec_name']=="Amit")
			 {

			 ?>

			 <div class="body-dash ">
			<div class="row mb-4">
				<div class="col-lg-6 col-md-6">
					
				</div>
				<div class="col-lg-6 col-md-6">
					
				
							<a href="ticket_history.php?id=<?php echo $_POST['exec_name'] ?>" class="btn btn-warning float-right"><i class="fa fa-history"></i> History</a>
							
					
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
						<th>Current Status</th>
						<th>Update Status</th>
								
						
						
					</thead>
					<tbody>
						<?php
              				
							
							$tsql = "SELECT * FROM `isms_ticket` WHERE assigned_to='Amit' AND (status_bit='0' OR status_bit='2') order by sr_no desc";
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

									  
									   <td><a href="status_update.php?id=<?php echo $trow['ticket_no'] ?> ">Click to Update</a> </td>
									  


									
						         </tr>
						    <?php 

						     $num++;

						 }  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
include('footer.php');

	}

	else if($_POST['exec_name']=="Mudit")
			 {

			 ?>

			 <div class="body-dash ">
			<div class="row mb-4">
				<div class="col-lg-6 col-md-6">
					
				</div>
				<div class="col-lg-6 col-md-6">
					
				
							<a href="ticket_history.php?id=<?php echo $_POST['exec_name'] ?>" class="btn btn-warning float-right"><i class="fa fa-history"></i> History</a>
							
					
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
						<th>Current Status</th>
						<th>Update Status</th>
								
						
						
					</thead>
					<tbody>
						<?php
              				
							
							$tsql = "SELECT * FROM `isms_ticket` WHERE assigned_to='mudit' AND (status_bit='0' OR status_bit='2') order by sr_no desc";
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

									  
									   <td><a href="status_update.php?id=<?php echo $trow['ticket_no'] ?> ">Click to Update</a> </td>
									  


									
						         </tr>
						    <?php 

						     $num++;

						 }  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
include('footer.php');

	}
}?>
		

			
			