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
  $pc=$_GET['p'];
  $rd=$_GET['r'];
  $pr=$_GET['pr'];
  $type=$_GET['t'];
  $avp_email=$_GET['e'];

  

  if ($feed=="Approved")
	{
		$avp_status="1";

		$sql1="select * from pri_tracker";
		$res1 = mysqli_query($conn,$sql1);
		$count=mysqli_num_rows($res1);
	
		$sr_no=$count+1;
		$pri="Temp_no._".$sr_no;
		for($i=1;$i<=$pc;$i++)
		{
				$sql2 = "INSERT INTO `pri_tracker`(`sr_no`, `provided_by`,`client_pri_rec_date`,`request_date`, `updated_thrg`, `pri_number`, `owner_name`, `type`, `process_name`, `avp_email`, `activation_date`, `allocation_date`, `gateway_ip`, `port`, `in_out`, `billing_to`, `dnc_ndnc`, `dialer`, `prefix`) VALUES ('$sr_no','Provided By Silaris','','$rd','Not Updated','$pri','Not Updated','$type','$pr','$avp_email','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Not Updated','Manually')";

				$wires = mysqli_query($conn,$sql2);

    		$sr_no=$sr_no+1;
    		$pri="Temp_no._".$sr_no;
	   }

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
			echo "<script> alert('Please Provide Comments!');location.href='pri_feedback.php?id=$ticket_no&p=$pc&t=$type&r=$rd&pr=$pr&e=$avp_email';</script>";
	}
	else
	{

	$web = "update `pri_sim_request` set ceo_feedback='$feed', ceo_comments= '$reason', ceo_status= '$avp_status' where ticket_no='$ticket_no'";

		$wires = mysqli_query($conn,$web);


		if($wires == true)
		{
			
			$web2="SELECT * FROM `pri_sim_request` WHERE ticket_no='$ticket_no'";
			$wires2 = mysqli_query($conn,$web2);
			$trow=mysqli_fetch_array($wires2);


				if ($trow==true)
				{
						

						if($trow['ceo_status']=='1')
							{
							 
							 $process_name=$trow['process_name'];

							
							$mail->addAddress('tariq.zubair@silaris.in','Tariq Zubair');					
							
							$mail->Subject="PRI/SIM Card Request";
							$mail->Body="Dear Tariq, <br><br>

            PRI/SIM Card request for <strong>  " .$process_name. "</strong>  has been <strong> Approved </strong> by CEO. Kindly login at http://isms.silaris.in  to see details. <br> <br> Thank You! <br> <br><br><strong> Note: This is an auto generated mail.</strong>";

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