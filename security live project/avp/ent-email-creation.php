<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_POST['comsub']))
{
	
	$sn = $_GET['sid'];
	$comment = $_POST['comment'];
	

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$csq = "SELECT * FROM `sc_emailcreation` WHERE `sc_sno`='$sn'";
	$crs = mysqli_query($conn,$csq);
	$crow = mysqli_fetch_array($crs);
	$ceml = $crow['sc_processhead'];
	$repto = $crow['sc_reportingto'];
	$ueml = $crow['sc_createdemail'];
	$unam = $crow['sc_createdby'];
	
	$empnam = $crow['sc_empname'];
	$empnid = $crow['sc_empid'];
	$emproc = $crow['sc_process'];
	$empdes = $crow['sc_designation'];

	$wl = explode("@",$ceml);
	$td = strtoupper($wl[0]);
	$shl = str_replace("."," ",$td);
	
		$esql = "UPDATE `sc_emailcreation` SET `sc_processavp`='1', `sc_avpcomment`='$comment' WHERE `sc_sno`='$sn'";
	$eres = mysqli_query($conn,$esql);
	if($eres == true)
	{

		$mail->addAddress('Samarth.jain@silaris.in', 'Samarth Jain');
		$mail->addCC($ueml,$unam);
		$mail->addCC($ceml,$shl);
		$mail->Subject = 'Email ID Creation Request';
    	$mail->Body.= 'Hi AVP / VP, <br>Kindly login in http://isms.silaris.in & approve the email id creation request of below mention employee.<br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
    	$mail->Body.='<th>Process</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$empnam.'</td>';
    	$mail->Body.='<td>'.$empnid.'</td>';
    	$mail->Body.='<td>'.$emproc.'</td>';
    	$mail->Body.='<td>'.$empdes.'</td>';
    	$mail->Body.='<td>'.$repto.'</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	$mail->Body.=$comment;
    	$mail->Body.='<br>';
    	$mail->Body.='<b>Approved</b>';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	$mail->send();
	if($eres == true)
	{
		header('Location:email-creation.php');
		exit();
	}
}
else
{
	echo "<script>alert('Somthing went Wrong!')</script>";
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
			        <a class="nav-link" href="isms-topics.php">ISMS Topics</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i><?php echo $adname?></a>
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
			
			<?php
            		if(isset($_GET['sid']))
                    {
                     	  ?>
                          <div class="comtbox">
                          <form class="combox" method="POST">
                          <div class="form-group">
                          	<label>Comment</label>
                          	<textarea class="form-control" name="comment"></textarea>
                          </div>
                          	<div class="form-group">
                          <input type="submit" name="comsub" class="btn btn-danger">
                          	</div>
                          	
                          </form>
                          </div>
                          <?php
                    }
                       
            ?>
		</div>







<?php
include('footer.php');
?>