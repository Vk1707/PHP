<?php
include('header.php');


?>
<?php
if(isset($_POST['web_access']))
{
	
	$aid=$_GET['id'];
	$v1=$_POST['empname'];
	$v2=$_POST['website'];

	$sql2="update website_access set access_req_for='$v1', website_name='$v2' where access_id='$aid'" ;
	$res2=mysqli_query($conn,$sql2);
	if ($res2==true)
	{

		echo "<script> alert('Data Updated Successfully!');location.href='website-access.php'</script>";
         $mail->addAddress($avp_emailid,$avp_name);
		 $mail->addAddress('isms@silaris.in','Tanay');
		$mail->addCC($mngr_emailid,$mngr_name);
		$mail->Subject="Website Access Request";
		$mail->Body="Dear Sir,<br>

        We have resent a request for website link approval. Kindly login at http://isms.silaris.in  to give security clearance. 
 <br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";

			$mail->send();
	}
	else
		{
			echo "<script> alert('Information Not Updated!')</script>";
		}
}?>
	

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
		
		<?php
					$aid=$_GET['id'];
					$sql1="select * from website_access where access_id='$aid'";
					$res1=mysqli_query($conn,$sql1);
					$trow1=mysqli_fetch_array($res1);
					
		?>

		<div class="body-dash">
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
					<textarea name="empname" class="form-control" required><?php 
 					
					
					echo $trow1['access_req_for'];?> </textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process Name</label>
					

					<input type="text" name="process_name" class="form-control" value="<?php 
 					
					
					echo $trow1['process_name'];?>" readonly>


				
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Name</label>
					<input type="text" name="mngr_name" class="form-control" value="<?php echo $trow1['process_manager_name'];?>" readonly>
				</div>
				
			</div>

			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Employee Id</label>
					<input type="text" name="mngr_id" class="form-control" value="<?php echo $trow1['manager_emp_id'];?>" readonly>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Process Manager Email Id</label>
					<input type="email" name="mngr_emailid" class="form-control" value="<?php echo $trow1['manager_email_id'];?>" readonly>
					
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>AVP Name</label>
					<input type="text" name="avp_name" class="form-control" value="<?php echo $trow1['avp_name'];?>" readonly>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>AVP Email Id</label>			
					<input type="email" name="avp_emailid" class="form-control" value="<?php echo $trow1['avp_emailid'];?>" readonly>
			
				</div>
				
			</div>
			<div class="form-group row">
				
				<div class="col-lg-6 col-md-6">
					<label>Website/ Link Name</label>
					<textarea rows="4" cols="20" name="website" class="form-control" required><?php echo $trow1['website_name'];?></textarea>
				</div>

				<div class="col-lg-6 col-md-6">
					
					
				</div>

				
			</div>
			
			<div class="form-group text-center">
				<input type="submit" name="web_access" class="btn btn-dark" value="Edit">
				
			</div>
		</form>
		</div>
</div>
<?php
include('footer.php');
?>