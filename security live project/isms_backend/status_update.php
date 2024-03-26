<?php
include('header.php');
include ('../emailconfig.php');
date_default_timezone_set('Asia/Kolkata');

?>
<?php
if (isset($_POST['sub']))
{
	
  $feed=$_POST['feedback'];
  $reason=$_POST['txt'];
  	
  $wid=$_GET['id'];
  
  

	if ($feed=="Closed")
	{
		$status="1";
		$dd= date('Y-m-d h:i:s');
		$web = "update isms_ticket set status='$feed', hold_feedback= '$reason' , status_bit='$status' , ticket_close_time='$dd' where ticket_no='$wid'";

	}
	else if($feed=="Hold")
	{
		$status="2";
		
		$web = "update isms_ticket set status='$feed', hold_feedback= '$reason' , status_bit='$status'  where ticket_no='$wid'";

	}
	
		$wires = mysqli_query($conn,$web);
		if($wires == true)
		{
			
			$web2="select * from isms_ticket where ticket_no='$wid'";
			$wires2 = mysqli_query($conn,$web2);
			$trow=mysqli_fetch_array($wires2);


				if ($trow==true)
				{
						if($trow['status_bit']=='1')
							{
								
							
							$mail->addAddress('isms@silaris.in','Tanay');
							
							$mail->Subject="Ticket Closed";
							$mail->Body="Dear Sir, <br> <br>  Ticket No  " . $wid." has been closed. <br> <br> Thank You! <br> <br> Note: This is an auto generated mail."; 


							$mail->send();
							echo "<script> alert('Information Saved Successfully!');location.href='ticket_view.php';</script>";
						}

						else if ($trow['status_bit']=='2')
						{
							
							$mail->addAddress('isms@silaris.in','Tanay');
							
							
							$mail->Subject="Ticket on Hold";
							$mail->Body="Dear Sir, <br> <br> Ticket No  ". $wid." is put on Hold,<br> <br> Thank You! <br> <br> Note: This is an auto generated mail.";


							$mail->send();
							echo "<script> alert('Information Saved Successfully!');location.href='ticket_view.php';</script>";


						}

						
				}


	}
		else
		{
			echo "<script> alert('Information Not Saved')</script>";
			header('location:ticket_view.php');

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
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 class="text-info text-center">Update Status</h3> 

				<div class="form-group ">
				
				
				<select name="feedback" class="form-control" required>
					  <option value="" hidden> Click to choose..... </option>
					 <option value="Closed"> Closed </option>
  					 <option value="Hold">Hold</option>
  					 
  				</select>
				</div>
				<div class="form-group ">

				
					<label > Feedback (in case of Hold)</label>
					<textarea name="txt" class="form-control" >
					</textarea>
				</div>

			

    		  <div class="form-group text-center">
    		   		<input class="btn btn-info " type="submit" name="sub" value="SAVE">
				
		
			</form>
		</div>

		
	

</div>
<?php
include('footer.php');
?>