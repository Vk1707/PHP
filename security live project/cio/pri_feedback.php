<?php
include('header.php');
include ('../emailconfig_pri.php');


?>
<?php
if (isset($_POST['sub']))
{
  $feed=$_POST['feedback'];
  $reason=$_POST['txt'];
  $ticket_no=$_GET['id'];
  
  
  if ($feed=="Approved")
	{
		$avp_status="1";


	}
	else if($feed=="Rejected")
	{
		$avp_status="2";
	
	}
	else if($feed=="On Hold")
	{
		$avp_status="3";
	}
	
if (($feed=="Rejected" AND $reason=="")OR ($feed=="On Hold" AND $reason==""))
	{
			echo "<script> alert('Please Provide Comments!');location.href='pri_feedback.php?id=$ticket_no';</script>";
	}
	else
	{


	$web = "update `pri_sim_request` set cio_feedback='$feed', cio_comments= '$reason', cio_status= '$avp_status' where ticket_no='$ticket_no'";

		$wires = mysqli_query($conn,$web);
		if($wires == true)
		{
			
			$web2="SELECT * FROM `pri_sim_request` WHERE ticket_no='$ticket_no'";
			$wires2 = mysqli_query($conn,$web2);
			$trow=mysqli_fetch_array($wires2);


				if ($trow==true)
				{
						

						if($trow['cio_status']=='1')
							{
							 
							 $process_name=$trow['process_name'];

							
							$mail->addAddress('ruumila.sadhu@silaris.in','CEO');					
							
							$mail->Subject="PRI/SIM Card Request";
							$mail->Body="Dear Madam, <br><br>

            PRI/SIM Card request for <strong>  " .$process_name. "</strong>  has been <strong> Approved </strong> by CIO. Kindly login at http://isms.silaris.in   to see details. <br> <br> Thank You! <br> <br><br><strong> Note: This is an auto generated mail.</strong>";

							$mail->send();

							echo "<script> alert('Information Saved Successfully!');location.href='view_pri_request.php';</script>";
						}

					else
					{
						echo "<script> alert('Information Saved Successfully!');location.href='view_pri_request.php';</script>";
					}
				}
			}
		

		else
		{
			echo "<script> alert('Information Not Saved')</script>";
			header('location:pri_feedback.php');

		}
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
			     <!-- <li class="nav-item">
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
						<h3 class="float-left" style="color:#0A1551"> FEEDBACK </h3> <br>
						<hr size="8" width="100%" color="#23262C">

				<div class="form-group ">
				
				
				<select  name="feedback" class="form-control" required>
					  <option value="" hidden >Click to provide Feedback.....</option>
					 <option value="Approved">Approved </option>
  					 <option value="Rejected">Rejected</option>
  					 <option value="On Hold">On Hold</option>
  				</select>
  				
				</div>
				
							
					   <br> <div  class="form-group">
									<label style="color:#0A1551"> Comments (if any) </label>
									<textarea rows="5" name="txt" class="form-control"></textarea>
					    </div> <br>

					 
		
    		  <br><div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="SAVE">
						
			</form>
			
		</div>

</div>


<?php
include('footer.php');
?>