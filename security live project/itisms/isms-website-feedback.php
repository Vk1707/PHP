<?php
include('header.php');
include ('../emailconfig.php');


?>
<?php
if (isset($_POST['sub']))
{
  $feed=$_POST['feedback'];
  $reason=$_POST['txt'];
  $rejection_file = $_FILES["reason-file"]["name"];
  $wid=$_GET['id'];
  
    $filetmp = $_FILES['reason-file']['tmp_name']; //temp_name will remain fixed
	$target_dir = "../uploads/";  
	$target_file = $target_dir . basename($_FILES["reason-file"]["name"]);// name will remain fixed
	
	move_uploaded_file($filetmp,$target_file);

	if ($feed=="Approved")
	{
		$status="1";

	}
	else if($feed=="Rejected")
	{
		$status="2";
	}
	else if($feed=="On Hold")
	{
		$status="3";
	}



	$web = "update website_access set isms_feedback='$feed', isms_status= '$status' , isms_reason= '$reason', isms_rejection_file='$rejection_file' where access_id='$wid'";

		$wires = mysqli_query($conn,$web);
		if($wires == true)
		{
			
			$web2="select * from website_access where access_id='$wid'";
			$wires2 = mysqli_query($conn,$web2);
			$trow=mysqli_fetch_array($wires2);


				if ($trow==true)
				{
						if($trow['isms_status']=='1')
							{
								$avp_emailid=$trow['avp_emailid'];
							$avp_name=$trow['avp_name'];
							$mngr_emailid=$trow['manager_email_id'];
							$mngr_name=$trow['process_manager_name'];
							
							$mail->addAddress('ruumila.sadhu@silaris.in','CEO');
							$mail->addCC($avp_emailid,$avp_name);
							$mail->addCC($mngr_emailid,$mngr_name);
							$mail->addCC('isms@silaris.in','Tanay');
							$mail->Subject="Website Access Request";
							$mail->Body="Dear Madam, <br> ISMS Team has given security clearance, Kindly login at http://isms.silaris.in to review and approve. <br> <br> Thank You! <br> <br> Note: This is an auto generated mail."; 


							$mail->send();
							echo "<script> alert('Information Saved Successfully!');location.href='website-access.php';</script>";
						}

						else if ($trow['isms_status']=='2')
						{
							$avp_emailid=$trow['avp_emailid'];
							$avp_name=$trow['avp_name'];
							$mngr_emailid=$trow['manager_email_id'];
							$mngr_name=$trow['process_manager_name'];
							$mail->addAddress($avp_emailid,$avp_name);
							
							$mail->addAddress($mngr_emailid,$mngr_name);
							$mail->addCC('isms@silaris.in','Tanay');
							$mail->Subject="Website Access Request";
							$mail->Body="Dear Process / Dept. Manager, <br> ISMS Officer has rejected the request, Kindly login at http://isms.silaris.in to find their comments.<br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";


							$mail->send();
							echo "<script> alert('Information Saved Successfully!');location.href='website-access.php';</script>";


						}

						else if ($trow['isms_status']=='3')
						{

							$avp_emailid=$trow['avp_emailid'];
							$avp_name=$trow['avp_name'];
							$mngr_emailid=$trow['manager_email_id'];
							$mngr_name=$trow['process_manager_name'];
							$mail->addAddress($avp_emailid,$avp_name);
							
							$mail->addAddress($mngr_emailid,$mngr_name);
							$mail->addCC('isms@silaris.in','Tanay');
							$mail->Subject="Website Access Request";
							$mail->Body=" Dear Process / Dept. Manager, <br>  Clearance Under Hold for  ".$trow['website_name']. "Kindly contact ISMS for further Clarification. <br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";

							$mail->send();
							echo "<script> alert('Information Saved Successfully!');location.href='website-access.php';</script>";


						}
						
				}


	}
		else
		{
			echo "<script> alert('Information Not Saved')</script>";
			header('location:website-access.php');

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
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 class="text-info text-center"> FEEDBACK </h3> 

				<div class="form-group ">
				
				
				<select name="feedback" class="form-control" required>
					  <option value=""> Select Feedback </option>
					 <option value="Approved"> Approved </option>
  					 <option value="Rejected"> Rejected</option>
  					 <option value="On Hold"> On Hold</option>
  				</select>
				</div>
				<div class="form-group ">

				
					<label > Reason (if Any)</label>
					<textarea name="txt" class="form-control" >
					</textarea>
				</div>

				<div class="form-group ">

				 <label >Upload File (in case of Rejection)</label>
    			  <input type="file" name="reason-file" class="form-control-file">
    		   </div>

    		  <div class="form-group text-center">
    		   		<input class="btn btn-info " type="submit" name="sub" value="SAVE">
				
		
			</form>
		</div>

		
	

</div>
<?php
include('footer.php');
?>