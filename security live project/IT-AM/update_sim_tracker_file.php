<?php
include('header.php');
include_once('../PHPExcel/IOFactory.php');
include("../PHPExcel.php");


date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['submit']))
{
	$fileName = $_FILES['fileToUpload']['name'];
	$fileTemp = $_FILES['fileToUpload']['tmp_name'];

	$objExcel = PHPExcel_IOFactory::load($fileTemp);
	foreach($objExcel->getWorksheetIterator() as $worksheet)
	{
		$highestrow = $worksheet -> getHighestRow();

		for($row=2;$row<=$highestrow;$row++)
		{
			$provided_by = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$rec_on = $worksheet->getCellByColumnAndRow(2,$row)->getValue();

			if($rec_on=="")
			{
				$received_on="";
			}
			else
			{
			$unix_date = ($rec_on - 25569) * 86400;
			$excel_date = 25569 + ($unix_date / 86400);
			$unix_date = ($excel_date - 25569) * 86400;
			$received_on =  gmdate("Y-m-d", $unix_date);
			}

			$req_date= $worksheet->getCellByColumnAndRow(3,$row)->getValue();

			if($req_date=="")
			{
				$request_date="";
			}
			else
			{
			$unix_date = ($req_date - 25569) * 86400;
			$excel_date = 25569 + ($unix_date / 86400);
			$unix_date = ($excel_date - 25569) * 86400;
			$request_date =  gmdate("Y-m-d", $unix_date);
			}

			$mobile_number= $worksheet->getCellByColumnAndRow(4,$row)->getValue();
			$sim_number= $worksheet->getCellByColumnAndRow(5,$row)->getValue();
			$sim_type= $worksheet->getCellByColumnAndRow(6,$row)->getValue();
			$process= $worksheet->getCellByColumnAndRow(7,$row)->getValue();
			$avp_email= $worksheet->getCellByColumnAndRow(8,$row)->getValue();
			$gateway_ip= $worksheet->getCellByColumnAndRow(9,$row)->getValue();
			$port= $worksheet->getCellByColumnAndRow(10,$row)->getValue();
			$act_date= $worksheet->getCellByColumnAndRow(11,$row)->getValue();
			if($act_date=="")
			{
				$activation_date="";
			}
			else
			{
			$unix_date = ($act_date - 25569) * 86400;
			$excel_date = 25569 + ($unix_date / 86400);
			$unix_date = ($excel_date - 25569) * 86400;
			$activation_date =  gmdate("Y-m-d", $unix_date);
		    }
			$alloc_date= $worksheet->getCellByColumnAndRow(12,$row)->getValue();
			if($alloc_date=="")
			{
				$allocation_date="";
			}
			else
			{
			$unix_date = ($alloc_date - 25569) * 86400;
			$excel_date = 25569 + ($unix_date / 86400);
			$unix_date = ($excel_date - 25569) * 86400;
			$allocation_date =  gmdate("Y-m-d", $unix_date); 

			}
			$sql1="select * from sim_tracker";
			$res1 = mysqli_query($conn,$sql1);
			$count=mysqli_num_rows($res1);
			$sr_no=$count + 1;
					

			$sqll = "INSERT INTO `sim_tracker`(`sr_no`, `provided_by`, `received_on`, `request_date`, `mobile_number`, `sim_number`, `sim_type`, `process`, `avp_email`, `gateway_ip`, `port`, `activation_date`, `allocation_date`, `updated_thrg`) VALUES ('$sr_no','$provided_by','$received_on','$request_date','$mobile_number','$sim_number','$sim_type','$process','$avp_email','$gateway_ip','$port','$activation_date','$allocation_date','Excel_File')";

				$ress = mysqli_query($conn,$sqll);
					
				
		}
	}
	if($ress==true)
			{
				echo "<script> alert('Data Uploaded Successfully!')</script>";
			}
			else
			{
				echo "<script> alert('SIM Number already Exist!')</script>";
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
			        <a class="nav-link" href="#">ISMS Policies</a>
			      </li> -->
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname?></a>
			         <div class="dropdown-menu">
				        <a class="dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profile</a>
				        <a class="dropdown-item" href="agent_change_password.php"><i class="fa fa-lock"></i>Password</a>
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
			<form action="" method="post" enctype="multipart/form-data">
				<div class="container">
					<div class="jumbotron ">
			  <h2 class="text-center float-left" style="color:#0A1551">Update SIM Tracker Using Excel File</h2><br>
			  <hr size="8" width="100%" color="#23262C"><br>
			   <div class="form-group">
			  <input type="file" name="fileToUpload" required style="color:#0A1551;width:22%"><a href="..\uploads\sim_format_sample.xls">(Click here to see File format)</a>
			</div>
			<div class="form-group text-center">
			  <input type="submit" value="Upload File" name="submit" class="btn" style="background-color:#0A1551;color:#fff;">
			</div>
			</div>
			</div>
			</form>
    </div>
  </div>
			
		
	
<?php
include('footer.php');
?>