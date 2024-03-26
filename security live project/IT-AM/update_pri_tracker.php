<?php
include('header.php');

?>
<?php
if (isset($_POST['sub']))
{
  $updated_thrg=$_POST['updated_thrg'];
   
   if($updated_thrg=="Excel_file")
   				{
							 header('location:update_pri_tracker_file.php');
						}

					else
					{
						 header('location:view_pri_tracker.php');
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
						<h3 class="float-left" style="color:#0A1551"> Update PRI Tracker </h3> <br>
						<hr size="8" width="100%" color="#23262C">

				<div class="form-group ">
				
				<br>
				 			<h5 style="color:#0A1551">Please Select</h5>
  						<input type="radio"  name="updated_thrg" value="Excel_file">
 						 <label style="color:#0A1551">Upload Excel File</label><br>
  						<input type="radio" name="updated_thrg" value="Manually">
  						<label style="color:#0A1551">Manually</label><br>  
				</div> <br>

					 
		
    		  <br><div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="SUBMIT">
    		   	</div>
						
			</form>
			
		</div>

</div>


<?php
include('footer.php');
?>