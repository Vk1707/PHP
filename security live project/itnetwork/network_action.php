<?php
include('header.php');
include ('../emailconfig.php');

?>
<?php
if (isset($_POST['sub']))
{
  $feed=$_POST['wh_action'];
  

  $wid=$_GET['id'];
  
  if ($feed=="whitelisted")
	{
		$status="1";

	}
	else if($feed=="not_whitelisted")
	{
		$status="2";
	}
	



	$web = "update website_access set network_status= '$status' where access_id='$wid'";

		$wires = mysqli_query($conn,$web);
		
		if($wires == true)
		{
			
			$web2="select * from website_access where access_id='$wid'";
			$wires2 = mysqli_query($conn,$web2);
			$trow=mysqli_fetch_array($wires2);


				if ($trow==true)
				{
						if($trow['network_status']=='1')
							{
								$avp_emailid=$trow['avp_emailid'];
							$avp_name=$trow['avp_name'];
							$mngr_emailid=$trow['manager_email_id'];
							$mngr_name=$trow['process_manager_name'];
						
							$mail->addAddress($mngr_emailid,$mngr_name);
				  	     $mail->addCC($avp_emailid,$avp_name);
						  $mail->addCC('isms@silaris.in','Tanay');
						  $mail->addCC('network.support@silaris.in','Network Support');
							$mail->Subject="Website Access Request";
							$mail->Body="Dear Ops / Dept.,<br> Website link has been whitelisted, kindly check.<br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";

							$mail->send();

						}
							echo "<script> alert('Information Saved Successfully!');location.href='website_access.php';</script>";
				}
			}

		else
		{
			echo "<script> alert('Information Not Saved!');location.href='website_access.php';</script>";
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
						

				<div class="form-group ">
				
				
				<input type="radio" name="wh_action" value="whitelisted"> Whitelisted
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="wh_action" value="not_whitelisted">Not Whitelisted
				</div>
				<div class="form-group ">

				
					
				

    		  <div class="form-group text-center">
    		   		<input class="btn btn-info " type="submit" name="sub" value="SAVE">
    		   	</div>
				
		
			</form>
		</div>

		
	

</div>
<?php
include('footer.php');
?>