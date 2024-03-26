<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_POST['emailacess']))
{

	$empname = $_POST['empname'];
	$prefix = $_POST['prefix'];
	$empd = strtoupper($_POST['empid']);
	$empid = $prefix.$empd;
	$process = $_POST['process'];
	$empemail = $_POST['empemail'];
	$desigtn = $_POST['desigtn'];
	$reporting = $_POST['reporting'];

	
	
	$opids1 = $_POST['opids'];
	$messt1 = str_replace(array("'","<",">",","," ",";"),'*',$opids1);
	$meta1 = (array_filter(explode("*", $messt1)));
	
	$querydata1 = "";
foreach ($meta1 as $val1) {
	
	$pest1 = strpos($val1, substr($val1, strpos($val1,'@')));
	$fistval1 = substr($val1, '0',strpos($val1,'@'));
	$lastval1 = substr($val1, strpos($val1,'@'));
	if($pest1 != 0)
	{
		$querydata1 .= htmlentities($fistval1.$lastval1."<br>");
	}

}
$opids = $querydata1;
	
	$itismsids1 = $_POST['itismsids'];
	$messt2 = str_replace(array("'","<",">",","," ",";"),'*',$itismsids1);
	$meta2 = (array_filter(explode("*", $messt2)));

$querydata2 = "";
foreach ($meta2 as $val2) {
	
	$pest2 = strpos($val2, substr($val2, strpos($val2,'@')));
	$fistval2 = substr($val2, '0',strpos($val2,'@'));
	$lastval2 = substr($val2, strpos($val2,'@'));
	if($pest2 != 0)
	{
		$querydata2 .= htmlentities($fistval2.$lastval2."<br>");
	}

}
$itismsids = $querydata2;
	
	$adminids1 = $_POST['adminids'];
	$messt3 = str_replace(array("'","<",">",","," ",";"),'*',$adminids1);
	$meta3 = (array_filter(explode("*", $messt3)));

$querydata3 = "";
foreach ($meta3 as $val3) {
	
	$pest3 = strpos($val3, substr($val3, strpos($val3,'@')));
	$fistval3 = substr($val3, '0',strpos($val3,'@'));
	$lastval3 = substr($val3, strpos($val3,'@'));
	if($pest3 != 0)
	{
		$querydata3 .= htmlentities($fistval3.$lastval3."<br>");
	}

}
$adminids = $querydata3;

	$tainerids1 = $_POST['tainerids'];
	$messt4 = str_replace(array("'","<",">",","," ",";"),'*',$tainerids1);
	$meta4 = (array_filter(explode("*", $messt4)));

$querydata4 = "";
foreach ($meta4 as $val4) {
	
	$pest4 = strpos($val4, substr($val4, strpos($val4,'@')));
	$fistval4 = substr($val4, '0',strpos($val4,'@'));
	$lastval4 = substr($val4, strpos($val4,'@'));
	if($pest4 != 0)
	{
		$querydata4 .= htmlentities($fistval4.$lastval4."<br>");
	}

}
$tainerids = $querydata4;

	$externalids1 = $_POST['externalids'];
	$messt5 = str_replace(array("'","<",">",","," ",";"),'*',$externalids1);
	$meta5 = (array_filter(explode("*", $messt5)));

$querydata5 = "";
foreach ($meta5 as $val5) {
	
	$pest5 = strpos($val5, substr($val5, strpos($val5,'@')));
	$fistval5 = substr($val5, '0',strpos($val5,'@'));
	$lastval5 = substr($val5, strpos($val5,'@'));
	if($pest5 != 0)
	{
		$querydata5 .= htmlentities($fistval5.$lastval5."<br>");
	}

}
$externalids = $querydata5;	


	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d');
	$daytime = date('Y-m-d h:i:s');
	$utime = date('h:i:s');
	

	
	$csql = "INSERT INTO `sc_emailcreation`(`sc_empname`, `sc_empid`, `sc_process`, `sc_designation`,`sc_suggestemail`, `sc_reportingto`, `sc_oprationids`, `sc_itismsids`, `sc_adminids`, `sc_trainerids`, `sc_externalids`, `sc_status`, `sc_action`, `sc_createdon`, `sc_createdby`, `sc_createdemail`) VALUES ('$empname','$empid','$process','$desigtn','$empemail','$reporting','$opids','$itismsids','$adminids','$tainerids','$externalids','1','5','$daytime','$adname','$ademail')";
	$cres = mysqli_query($conn,$csql);


		$mail->addAddress('email.support@silaris.in', 'Arun Dogra');
		$mail->addCC($ademail,$adname);
		$mail->Subject = 'Exist Email Access';
    	$mail->Body.= 'Hi Email Support Team, <br> Employee has send request for email access, please give previous access detail of below mention email ID . for reply goto http://isms.silaris.in/ <br><br>';
    	$mail->Body.='<table border="1">';
    	$mail->Body.='<tr>';
    	$mail->Body.='<th>Employee Name</th>';
    	$mail->Body.='<th>Employee ID</th>';
		$mail->Body.='<th>Email ID</th>';
    	$mail->Body.='<th>Process</th>';
    	$mail->Body.='<th>Designation</th>';
    	$mail->Body.='<th>Reporting</th>';
    	$mail->Body.='<th>Email Accesses</th>';
    	$mail->Body.='<th>Previous accesses</th>';
    	$mail->Body.='</tr>';
    	$mail->Body.='<tr>';
    	$mail->Body.='<td>'.$empname.'</td>';
    	$mail->Body.='<td>'.$empid.'</td>';
		$mail->Body.='<td>'.$empemail.'</td>';
    	$mail->Body.='<td>'.$process.'</td>';
    	$mail->Body.='<td>'.$desigtn.'</td>';
		$mail->Body.='<td>'.$reporting.'</td>';
    	$mail->Body.='<td>'.html_entity_decode($opids).html_entity_decode($itismsids).html_entity_decode($adminids).html_entity_decode($tainerids).html_entity_decode($externalids).'</td>';
    	$mail->Body.='<td>To be filled by IT Dept:</td>';
    	$mail->Body.='</tr>';
    	$mail->Body.='</table>';
    	$mail->Body.='<br><br>';
    	//$mail->Body.='Please confirm, Is employee exist or not in Portal';
    	$mail->Body.='<br><br>';
    	$mail->Body.='Thank you!';
    	

		if($cres == true AND $mail->send())
		{
			header('Location:exist-access.php');
		}
		else
        {
        	echo "<script>alert('Wrong Data!')</script>";
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
			<div class="row mb-4">
				
				<div class="col-lg-12 col-md-12">
					
						<button class="btndanger float-right" id="addform"> <i class="fa fa-user-plus"> </i> Email Access</button>
						
					
				</div>
			</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
						<td>Date || Time</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Email ID</td>
						<td>Process</td>
						<td>Designation</td>
						<td>Email Access</td>
						<td>Reporting to</td>
						<td>Email Dept.</td>
						<td>ISMS</td>
              			<td>ISMS Comment</td>
						<td>CEO</td>
              			<td>Email Dept.</td>
						<td>Access Provided</td>
					</thead>
					<tbody>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_emailcreation` WHERE sc_status='1' AND sc_action='5' AND sc_createdemail='$ademail' ORDER BY sc_sno DESC";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_empname'];?></td>
									<td><?php echo $trow['sc_empid'];?></td>
									<td><?php echo $trow['sc_suggestemail'];?></td>
									<td><?php echo $trow['sc_process'];?></td>
									<td><?php echo $trow['sc_designation'];?></td>
									<td><?php echo html_entity_decode($trow['sc_oprationids'])."<br>".html_entity_decode($trow['sc_itismsids'])."<br>".html_entity_decode($trow['sc_adminids'])."<br>".html_entity_decode($trow['sc_trainerids'])."<br>".html_entity_decode($trow['sc_externalids']);?></td>
									<td><?php echo $trow['sc_reportingto'];?></td>
									<td><?php
									$hrid = $trow['sc_emailteam']; 
									if($hrid == "0")
									{
										echo "<img src='../assets/img/blue.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									<td><?php
									$hrid = $trow['sc_isms']; 
                            		switch($hrid)
                                    {
                                    	case "0":
                                    	echo "<img src='../assets/img/blue.png'>";
                                    	break;
                                    	case "1":
                                    	echo "<img src='../assets/img/green.png'>";
                                    	break;
                                    	case "2":
                                    	echo "<img src='../assets/img/red.png'>";
                                    	break;
                                    	
                                    
                                    }
									
									?></td>
                                    <td><?php echo $trow['sc_ismscomment'];?></td>
									<td><?php
									$proav = $trow['sc_ceo']; 
									if($proav == "0")
									{
										echo "<img src='../assets/img/blue.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
									
									
									
                                    <td><?php
									$hrid = $trow['sc_emailteam']; 
									if($hrid == "2")
									{
										
										echo "<img src='../assets/img/green.png'>";
									}
									else
									{
										echo "<img src='../assets/img/red.png'>";
									}
									
									?></td>
                                    <td><?php
									$act = $trow['sc_action']; 
									if($act == "5")
									{
										echo "<img src='../assets/img/red.png'>";
									}
									else
									{
										echo "<img src='../assets/img/green.png'>";
									}
									
									?></td>
								</tr>
								<?php
								$num++;
							}
						?>
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
					<label>Name of Employee</label>
				<input type="text" name="empname" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-4">
					SIPLIND <input type="radio" name="prefix" value="SIPLIND" checked> SIPLTEM <input type="radio" name="prefix" value="SIPLTEM">
					
				<input type="number" name="empid" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Email Address</label>
				<input type="email" name="empemail" class="form-control" required>
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-4 col-md-4">
					<label>Process / Dept.</label>
				<input type="text" name="process" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Designation</label>
					<input type="text" name="desigtn" class="form-control" required>
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Reporting to</label>
				<input type="text" name="reporting" class="form-control" required>
				</div>
				
			</div>
            
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<span class="font-weight-bold">Enter Send / Recieve Email Access</span>
					<label>Operation ID <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="opids"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<br>
					<label>IT / ISMS ID <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="itismsids"></textarea>
				</div>
				
				
			</div>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">

					<label>Admin ID / HR<small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="adminids"></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Trainer / Quality Dept. <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="tainerids"></textarea>
				</div>
				
			</div>
			<div class="form-group row">
				<div class="col-lg-12 col-md-12">
					<label>External Domain (If any) <small style="color:red">Separate with Comma (,)</small></label>
				<textarea class="form-control" placeholder="Email" name="externalids"></textarea>
				</div>
				
				
			</div>
			
			
			<div class="form-group">
				<input type="submit" name="emailacess" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>