<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php

if(isset($_POST['cansub']))
{
	$wid = $_GET['wid'];
	$ismscmnt = $_POST['ismscmnt'];

	$cst = "SELECT * FROM `sc_wifiaccess` WHERE sc_sno='$wid' AND sc_status='1'";
	$str = mysqli_query($conn,$cst);
	$rst = mysqli_fetch_array($str);
	$usemail = $rst['sc_createremail'];
	$usename = $rst['sc_createdby'];

	$sql = "UPDATE `sc_wifiaccess` SET sc_wifisms='1', sc_ismscom ='$ismscmnt' WHERE sc_sno='$wid'";
	$res = mysqli_query($conn,$sql);

	$mail->addAddress('network.alert@silaris.in', 'Network Alert');
		$mail->addCC($usemail, $usename);
		$mail->Subject = 'Wifi Access Request';
    	$mail->Body.= 'Hi, <br>This is email auto generated by ISMS CRM. for reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table style="width:100%">';
	
		$mail->Body.='<tr style="background-color:#f5d9af;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#000;font-family:arial;">Wifi Access Request Form</h2>
		</tr>';

		$csql = "SELECT * FROM `sc_wifiaccess` WHERE sc_sno='$wid'";
		$cres = mysqli_query($conn,$csql);
		$crow = mysqli_fetch_array($cres);

		$mail->Body.='
		
		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Name</td>
				<td>'.$crow['sc_wifiname'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Designation</td>
				<td>'.$crow['sc_wifidesinations'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Process / Dept</td>
				<td>'.$crow['sc_wifiprocess'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Guest/ Client/Internal employee</td>
				<td>'.$crow['sc_wifiguest'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Employee ID (if internal employee)</td>
				<td>'.$crow['sc_wifiempid'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Desktop/Laptop user</td>
				<td>'.$crow['sc_wifiassets'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">System MAC Address</td>
				<td>'.$crow['sc_wifisystem'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Date</td>
				<td style="color:#000">'.$crow['sc_wifidate'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Time Period of Internet Access</td>
				<td>'.$crow['sc_wifiperiod'].'</td>
			</tr>
			
		</table>
<br>';

$mail->Body.='
<table style="width:100%">
	<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Er. Tanay Dobhal <br><small><em>Information Security Officer
[ISMS]</em></small></td>
				<td>'.$ismscmnt.'</td>
			</tr>
			
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Network Support</td>
				<td></td>
			</tr>
</table>
';

$mail->Body.='
<br>
<hr>
<table style="width:100%">
		<tr style="text-align:center">
		<h3>Silaris Informations Pvt Ltd</h3>
		
	</tr>
	<tr style="text-align:center">
		<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
	</tr>	
</table>';
	if($res == true AND $mail->send())
	{
		header('Location:wifi-access.php');
	}
}
?>
<?php

if(isset($_POST['canclesub']))
{
	$wid = $_GET['wid'];
	$ismscmnt = $_POST['ismscmnt'];

	$cst = "SELECT * FROM `sc_wifiaccess` WHERE sc_sno='$wid' AND sc_status='1'";
	$str = mysqli_query($conn,$cst);
	$rst = mysqli_fetch_array($str);
	$usemail = $rst['sc_createremail'];
	$usename = $rst['sc_createdby'];

	$sql = "UPDATE `sc_wifiaccess` SET sc_wifisms='2',	sc_ismscom='$ismscmnt',sc_wifiactive='2' WHERE sc_sno='$wid'";
	$res = mysqli_query($conn,$sql);

	$mail->addAddress($usemail, $usename);
		
		$mail->Subject = 'Wifi Access Request Rejected';
    	$mail->Body.= 'Hi, <br>This is email auto generated by ISMS CRM. for reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table style="width:100%">';
	
		$mail->Body.='<tr style="background-color:#eb7e7e;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#000;font-family:arial;">Wifi Access Request Form Rejected</h2>
		</tr>';

		$csql = "SELECT * FROM `sc_wifiaccess` WHERE sc_sno='$wid'";
		$cres = mysqli_query($conn,$csql);
		$crow = mysqli_fetch_array($cres);

		$mail->Body.='
		
		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Name</td>
				<td>'.$crow['sc_wifiname'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Designation</td>
				<td>'.$crow['sc_wifidesinations'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Process / Dept</td>
				<td>'.$crow['sc_wifiprocess'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Guest/ Client/Internal employee</td>
				<td>'.$crow['sc_wifiguest'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Employee ID (if internal employee)</td>
				<td>'.$crow['sc_wifiempid'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Desktop/Laptop user</td>
				<td>'.$crow['sc_wifiassets'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">System MAC Address</td>
				<td>'.$crow['sc_wifisystem'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Date</td>
				<td style="color:#000">'.$crow['sc_wifidate'].'</td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Time Period of Internet Access</td>
				<td>'.$crow['sc_wifiperiod'].'</td>
			</tr>
			
		</table>
<br>';

$mail->Body.='
<table style="width:100%">
	<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Er. Tanay Dobhal <br><small><em>Information Security Officer
[ISMS]</em></small></td>
				<td>'.$ismscmnt.'</td>
			</tr>
			
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Network Support</td>
				<td></td>
			</tr>
</table>
';

$mail->Body.='
<br>
<hr>
<table style="width:100%">
		<tr style="text-align:center">
		<h3>Silaris Informations Pvt Ltd</h3>
		
	</tr>
	<tr style="text-align:center">
		<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
	</tr>	
</table>';
	if($res == true AND $mail->send())
	{
		header('Location:wifi-access.php');
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
            		if(isset($_GET['wid']))
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