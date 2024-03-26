<?php
include('header.php');

?>

<?php 


if(isset($_POST['save']))
{

	$process_name = $_POST['pro_name'];

	$combined =$_POST['pro_avp_name'];
	$process=explode(",",$combined);
	$pro_avp_name=$process[1];
	$pro_avp_emailid=$process[0];
	
	$sql1="select * from new_processes";
	$res1 = mysqli_query($conn,$sql1);
	$count=mysqli_num_rows($res1);
	$sr_no=$count+1;

	
	$sql = "INSERT INTO `new_processes`(`sr_no`, `process_name`, `process_avp_name`, `avp_email`) VALUES ('$sr_no','$process_name','$pro_avp_name','$pro_avp_emailid')";
	$res = mysqli_query($conn,$sql);


	if ($res==true)
	{
    
    echo "<script> alert('Process Added Successfully!');location.href='process_name.php';</script>";
	}
	 else
	{
		echo "<script> alert('Process already Exist!')</script>";
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
						
						<h3 class="float-left" style="color:#0A1551">Add New Process</h3> <br>
						<hr size="8" width="100%" color="#23262C"><br>

						<div class="form-group row">
						  <div class="col-lg-3">
							  <label style="color:#0A1551">Process Name</label>
						  </div>
						  <div class="col-lg-3">


							<input type="text" name="pro_name" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						  <div class="col-lg-3">
							  <label style="color:#0A1551">Process AVP Name</label>
						  </div>
						  <div class="col-lg-3">


							<select name="pro_avp_name" class="form-control" required>
								  	 <option value="" hidden> Click to choose.....</option>
									 <option value="vinod.anand@silaris.in,Vinod Anand">Vinod Anand</option>
			  						 <option value="puneet.bhutani@silaris.in,Puneet Bhutani">Puneet Bhutani</option>
			  						<option value="prashant.arora@silaris.in,Prashant Arora">Prashant Arora</option>
			  						 <option value="anu.wig@silaris.in,Anu Wig">Anu Wig</option>
			  				</select>
						</div>
						</div><br>
						
						<div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="save" value="SAVE">
				  </div>
				</div>
			</div>
		
			</form>
		</div>





<?php
include('footer.php');
?>