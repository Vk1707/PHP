<?php
include('header.php');
?>
<?php
if(isset($_POST['filesub']))
{
	$filename = strtoupper($_POST['filename']);
	$filename = str_replace(' ', '-', $filename);
	$filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);

	$filNaam = $_FILES['fileContt']['name'];
	$filTemp = $_FILES['fileContt']['tmp_name'];

	date_default_timezone_set('Asia/Kolkata');
	$uploadon = date('Y-m-d h:i:s');
	$uploads_dir = '../uploads';
	

	$tsql = "INSERT INTO `sc_ismsfile`(`sc_filename`, `sc_filetemp`, `sc_uploadby`, `sc_uploadon`, `sc_status`) VALUES ('$filename','$filNaam','$adname','$uploadon','1')";
	$tres = mysqli_query($conn,$tsql);
	if($tres == true)
	{
		move_uploaded_file($filTemp, $uploads_dir.'/'.$filNaam);
		header('Location:isms-policies.php');
	}
	else
	{
		echo "<script>alert('Somthing Went Wrong!')</script>";
	}

}

?>
<?php
if(isset($_GET['del']))
{
	$del = $_GET['del'];
	$msql = "UPDATE `sc_ismsfile` SET `sc_status`='0' WHERE `sc_sno`='$del'";
	$mres = mysqli_query($conn,$msql);
	if($mres == true)
    {
    	header('Location:dashboard.php');
    }
	else
	{
		echo "<script>alert('Somthing Went Wrong!')</script>";
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
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="dis-menu">
						<button class="btndanger btn-block" id="addform"> <i class="fa fa-upload"> </i> Upload File</button>
						<ul class="dis-file-menu">
							<?php
								$sql = "SELECT * FROM `sc_ismsfile` WHERE sc_status='1'";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<li>
                                    <table><tr>
                                    <td>
                                    <a href="?del=<?php echo $row['sc_sno']?>" target="iframe_a" class='colink'><i class='fa fa-trash'></i></a>
                                    
                                    </td>
                                    <td>
                                    <a href="../uploads/<?php echo $row['sc_filetemp']?>" target="iframe_a"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_filename']?></a>	
                                    </td></tr></table>
                                    
                                    </li>
									<?php
								}
							?>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<div class="dis-file-view">
						<iframe src="" name="iframe_a" class="iframeclass">			
						</iframe>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<div class="internal-form" id="internal">
	<div class="infernal-display">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label>File Name :</label>
				<input type="text" name="filename" class="form-control" placeholder="File Name...">
			</div>
			<div class="form-group">
				<label>Choose your file : <small class="text-danger">(Only PDF)</small></label>
				<input type="file" name="fileContt" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="filesub" class="btn btn-dark" value="Submit">
				<button id="closeform" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>