<?php
include('header.php');
include_once("../emailconfig.php");
?>

<?php
if(isset($_POST['cansub']))
{
	$snot = $_GET['sid'];
	$ismscmnt = $_POST['ismscmnt'];

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
	$edes = $crow['sc_designation'];
	$opet = $crow['sc_oprationids'];
	$itid = $crow['sc_itismsids'];
	$adminid = $crow['sc_adminids'];
	$train = $crow['sc_trainerids'];
	$extrn - $crow['sc_externalids'];
	$alremal = $crow['sc_existemail'];
	$dname = $crow['sc_createdby'];
	$demail = $crow['sc_createdemail'];

	$esql = "UPDATE `sc_emailcreation` SET `sc_isms`='1', `sc_ismscomment`='$ismscmnt' WHERE `sc_sno`='$snot'";
	$eres = mysqli_query($conn,$esql);

		$mail->addAddress($ademail, $adname);
		// $mail->addCC($ademail,$adname);
		$mail->addCC($demail,$dname);
		$mail->Subject = 'Exist Email Access';
    	$mail->Body.= 'Hi Team, <br> <br>  ISMS Officer has given the security clearance to your request, Now wait for CEO approval';
		$mail->Body .= '<br>' . $ismscmnt;
		$mail->Body.='<br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$enam.'</td>';
    	$mail->Body.='<td>'.$eid.'</td>';
    	$mail->Body.='<td>'.$edes.'</td>';
    	$mail->Body.='<td>'.$ceml.'</td>';
    	$mail->Body.='<td>'.$opet.$itid.$adminid.$train.$extrn.'</td>';
    	$mail->Body.='<td>'.$alremal.'</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	$mail->send();

	if($eres == true)
	{
		header('Location:exist-access.php');
	}


}
?>
<?php
if(isset($_POST['canclesub']))
{
	$snot = $_GET['sid'];
	$ismscmnt = $_POST['ismscmnt'];

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
	$edes = $crow['sc_designation'];
	$opet = $crow['sc_oprationids'];
	$itid = $crow['sc_itismsids'];
	$adminid = $crow['sc_adminids'];
	$train = $crow['sc_trainerids'];
	$extrn - $crow['sc_externalids'];
	$alremal = $crow['sc_existemail'];
	$dname = $crow['sc_createdby'];
	$demail = $crow['sc_createdemail'];

	$esql = "UPDATE `sc_emailcreation` SET `sc_isms`='2', `sc_ismscomment`='$ismscmnt' WHERE `sc_sno`='$snot'";
	$eres = mysqli_query($conn,$esql);

		$mail->addAddress($demail, $dname);
		$mail->addCC($ademail,$adname);
		// $mail->addCC($demail,$dname);
		$mail->Subject = 'Exist Email Access';
    	$mail->Body.= 'Hi Team, <br> ISMS has reject your request, kinldy check the below mention comment.  <br><br>';
		$mail->Body.=$ismscmnt;
    	$mail->Body.='<br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$enam.'</td>';
    	$mail->Body.='<td>'.$eid.'</td>';
    	$mail->Body.='<td>'.$edes.'</td>';
    	$mail->Body.='<td>'.$ceml.'</td>';
    	$mail->Body.='<td>'.$opet.$itid.$adminid.$train.$extrn.'</td>';
    	$mail->Body.='<td>'.$alremal.'</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
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
                          	<textarea class="form-control" name="ismscmnt" require></textarea>
                          </div>
                          	<div class="form-group">
                          <input type="submit" name="cansub" class="btn btn-danger" value="Approve">
                          <input type="submit" name="canclesub" class="btn btn-warning" value="Reject">
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