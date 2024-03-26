<?php
include('header.php');
include ('../emailconfig_pri.php');


?>

<?php
if(isset($_POST['sub']))
{

	$req_date = $_POST['req_date'];
	$emp_name = $_POST['emp_name'];
	$emp_id = $_POST['emp_id'];
  $emp_desg = $_POST['emp_desg'];
	$req = $_POST['req'];
	$sim = $_POST['sim'];
  $sim_count = $_POST['sim_count'];
	$pri = $_POST['pri'];
	$pri_count = $_POST['pri_count'];

  $pri_normal = $_POST['pri_normal'];
	$pri_normal_count = $_POST['pri_normal_count'];
	$cost_center = $_POST['cost_center'];
	$combined = $_POST['process_name'];
	$process=explode(",",$combined);
	$process_name=$process[0];
	$avp_emailid=$process[1];
	$avp_name=$process[2];

	$ticket_number = $_POST['ticket_number'];
	$exist_pri140_count = $_POST['exist_pri140_count'];
	$exist_normal_pri_count = $_POST['exist_normal_pri_count'];
	$exist_sim_count = $_POST['exist_sim_count'];
  $pri_req_reason = $_POST['pri_req_reason'];
	$additional_details = $_POST['additional_details'];
	


	$sql1="select * from pri_sim_request";
	$res1 = mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($res1);
	$sr_no=$count+1;

	
	$sql = "INSERT INTO `pri_sim_request`(`sr_no`, `request_date`, `emp_name`, `emp_id`, `designation`, `requirement`, `sim_details`, `sim_count`, `pri_140_details`, `pri_140_count`, `pri_normal_details`, `pri_normal_count`, `cost_center`, `process_name`, `avp_emailid`,`ticket_no`,`existing_pri140_count`,`existing_normal_pri_count`,`existing_sim_count`,`pri_req_reason`, `additional_details`) VALUES ('$sr_no','$req_date','$emp_name','$emp_id','$emp_desg','$req','$sim','$sim_count','$pri','$pri_count','$pri_normal','$pri_normal_count','$cost_center','$process_name','$avp_emailid','$ticket_number','$exist_pri140_count','$exist_normal_pri_count','$exist_sim_count','$pri_req_reason','$additional_details')";
	$res = mysqli_query($conn,$sql);


	if ($res==true)
	{
			
			$mail->addAddress($avp_emailid,$avp_name);
			
			$mail->Subject="PRI/SIM Request";
			$mail->Body="Dear Sir/Madam, <br><br>

            PRI/SIM Card request for <strong>  " .$process_name. "</strong>  has been received. Kindly login at http://isms.silaris.in  to see details. <br> <br> Thank You! <br> <br><br><strong> Note: This is an auto generated mail.</strong>";

			//$mail->send();
    
    
    
    echo "<script> alert('Information Saved Successfully!');location.href='dashboard.php';</script>";
	}
	 else
	{
		echo "<script> alert('Ticket Number Already Exist, Please Provide a Unique Ticket Number!')</script>";
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
			      </li> 
			      <li class="nav-item">
			        <a class="nav-link" href="isms-policies.php">ISMS Policies</a>
			      </li> -->
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
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 style="background-color:#0A1551; color:white;" class="text-center"> PRI/SIM CARD REQUEST FORM </h3> <br>

				
			
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
				<label style="color:#0A1551">Date of Request</label>
				<input type="date" name="req_date" class="form-control" required>
				</div>
			</div>

				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
						<label style="color:#0A1551"><strong>Employee Details (who raised this request)</strong></label>
					</div>
				</div>

				
				<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Employee Name</label>
							<input type="text" name="emp_name" class="form-control" required>
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Employee ID (optional)</label>
							<input type="text" name="emp_id" class="form-control">
						</div>

			</div>
			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Designation</label>
							<input type="text" name="emp_desg" class="form-control" required>
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Request For </label>
              
							
              				<select name="req" class="form-control" required>
						  		 <option value="" hidden>Click to choose.....</option>
              					<option value="PRI">PRI</option>
              					<option value="SIM">SIM</option>
              					<option value="Both">Both</option>
              			</select>
						</div>

			</div>

			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">SIM (2G or Volte)</label>
              
							
              				<select name="sim" class="form-control">
						  		 <option value="" hidden>Click to choose.....</option>
						  		 				<option value=""></option>
              					 <option value="2G">2G</option>
              					<option value="Volte">Volte</option>
              					
              			</select>
              
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Required SIM Count</label>
							<input type="text" name="sim_count" class="form-control">
						</div>

			</div>

			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">PRI-140</label>
							<input type="text" name="pri" class="form-control">
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Required PRI-140 Count</label>
							<input type="text" name="pri_count" class="form-control">
						</div>

			</div>

			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Normal PRI</label>
							<input type="text" name="pri_normal" class="form-control">
						</div>
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Required Normal PRI Count</label>
							<input type="text" name="pri_normal_count" class="form-control">
						</div>

			</div>
			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Cost Center</label>
							
              				<select name="cost_center" class="form-control" required>
								  <option value="" hidden> Click to choose.....</option>
								  			
              					<option value="Silaris">Silaris</option>
              					<option value="Client">Client</option>
              				</select>
						</div>
						<div class="col-lg-6 col-md-6">
								
										<label style="color:#0A1551">Process Name</label>
										<select name="process_name" class="form-control" required>
								  			 <option value="" hidden> Click to choose.....</option>
											 <option value="HDFC ERGO,vinod.anand@silaris.in,Vinod Anand">HDFC ERGO</option>
			  								 <option value="MAX LIFE,vinod.anand@silaris.in,Vinod Anand">MAX LIFE</option>
			  								 <option value="AMEX EDM,vinod.anand@silaris.in,Vinod Anand">AMEX EDM</option>
			  								  <option value="TATA AIA,vinod.anand@silaris.in,Vinod Anand">TATA AIA</option>
			  								 <option value="SBI FLEXI,puneet.bhutani@silaris.in,Puneet Bhutani">SBI FLEXI</option>
			  								 <option value="SBI ENCASH,puneet.bhutani@silaris.in,Puneet Bhutani">SBI ENCASH </option>
			  								 <option value="SBI UPGRADE,puneet.bhutani@silaris.in,Puneet Bhutani">SBI UPGRADE</option>
			  								 <option value="SBI ADD ON,puneet.bhutani@silaris.in,Puneet Bhutani">SBI ADD ON</option>
			  								 <option value="SBI CPP TM,puneet.bhutani@silaris.in,Puneet Bhutani">SBI CPP TM</option>
			  								 <option value="VOLTAS,puneet.bhutani@silaris.in,Puneet Bhutani">VOLTAS</option>
			  								 <option value="IHO,puneet.bhutani@silaris.in,Puneet Bhutani">IHO</option>
			  								  <option value="SKYWORTH,puneet.bhutani@silaris.in,Puneet Bhutani">SKYWORTH</option>
			  								 <option value="SBI BT,puneet.bhutani@silaris.in,Puneet Bhutani">SBI BT</option>
			  								 <option value="RSA,puneet.bhutani@silaris.in,Puneet Bhutani">RSA</option>
			  								 <option value="HSBC,anu.wig@silaris.in,Anu Wig">HSBC</option>
			  								 <option value="HSBC CANARA,anu.wig@silaris.in,Anu Wig">HSBC CANARA</option>
			  								 <option value="CPP POS,prashant.arora@silaris.in,Prashant Arora">CPP POS</option>
			  								 
  									</select>
								</div>
						</div>

			
			<div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Ticket Number (Filled by IT Only) </label>
							<input type="text" name="ticket_number" class="form-control" required>
						</div>
              			<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Existing PRI-140 Count </label>
							<input type="text" name="exist_pri140_count" class="form-control" required>
						</div>
              
            </div>
             <div class="form-group row">
						<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Existing Normal PRI Count</label>
							<input type="text" name="exist_normal_pri_count" class="form-control" required>
						</div>
              			<div class="col-lg-6 col-md-6">
							<label style="color:#0A1551">Existing SIM Count </label>
							<input type="text" name="exist_sim_count" class="form-control" required>
						</div>
              
            </div>
              
              
              <div class="form-group row">
						<div class="col-lg-6 col-md-6">
              					<label style="color:#0A1551">PRI Request Reason </label>
							<select name="pri_req_reason" class="form-control" required>
                      			<option value="" hidden> Click to Choose.... </option>

                    		    <option value="Expansion"> Expansion </option>
                    			<option value="Replacement"> Replacement</option>
                    		   
  				            </select>
						</div>
              </div>

						<div class="form-group row">
						    <div class="col-lg-12 col-md-12">
							 <label style="color:#0A1551">Request Details (For additional PRI / SIM, state the reasons for your request):
							 </label>
							 <textarea  name="additional_details" class="form-control"></textarea>
						  </div>

		    	</div>



    		  <div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="SAVE">
				  </div>
				</div>
			</div>
		
			</form>
		</div>

		

<?php
include('footer.php');
?>