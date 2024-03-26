<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_POST['comsub']))
{
	
	$snot = $_GET['sid'];
	$comment = $_POST['comment'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');

	$csq = "SELECT * FROM `sc_emailcreation` WHERE `sc_sno`='$snot'";
	$crs = mysqli_query($conn,$csq);
	$crow = mysqli_fetch_array($crs);
	$ceml = $crow['sc_reportingto'];

	$eid = $crow['sc_empid'];
	$enam = $crow['sc_empname'];
	$eeamil = $crow['sc_suggestemail'];
	$edes = $crow['sc_designation'];
	$emailad = $crow['sc_emailaccess'];
	$dname = $crow['sc_createdby'];
	$demail = $crow['sc_createdemail'];

	$opet = $crow['sc_oprationids'];
	$itid = $crow['sc_itismsids'];
	$adminid = $crow['sc_adminids'];
	$train = $crow['sc_trainerids'];
	$extrn - $crow['sc_externalids'];

	$esql = "UPDATE `sc_emailcreation` SET `sc_emailteam`='1', `sc_existemail`='$comment' WHERE `sc_sno`='$snot'";
	$eres = mysqli_query($conn,$esql);

		$mail->addAddress('isms@silaris.in', 'Tanay Dobhal');
		$mail->addCC($ademail,$adname);
		$mail->addCC($demail,$dname);
		$mail->Subject = 'Email Access';
    	$mail->Body.= 'Hi ISMS Officer, <br> <br> requesting for your security clearance. For reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
		$mail->Body.='<th>Email Address</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$enam.'</td>';
    	$mail->Body.='<td>'.$eid.'</td>';
		$mail->Body.='<td>'.$eeamil.'</td>';
    	$mail->Body.='<td>'.$edes.'</td>';
    	$mail->Body.='<td>'.$ceml.'</td>';
    	$mail->Body.='<td>'.$opet.$itid.$adminid.$train.$extrn.'</td>';
    	$mail->Body.='<td>'.$comment.'</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	// $mail->Body.='Please confirm, Is employee exist or not in Portal';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	$mail->send();

	if($eres == true)
	{
		header('Location:exist-access.php');
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