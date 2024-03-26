	<?php
include('header.php');
include ('../emailconfig_pri.php');
date_default_timezone_set('Asia/Kolkata');

?>

<?php 

if(isset($_POST['sub']))
{
 		 	
			
	$combined = $_POST['process_name'];
	$process=explode(",",$combined);
	$_SESSION['process_name']=$process[0];

	$_SESSION['avp_emailid']=$process[1];
	$_SESSION['avp_name']=$process[2];
	header('location:client_pri.php');
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
			<?php include('sidebar.php'); ?>
		</div>
			

		<div class="body-dash">
			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					<div class="jumbotron ">
						<h3 class="float-left" style="color:#0A1551"> Please Choose Process Name </h3> <br>
						<hr size="8" width="100%" color="#23262C"><br>

					
				 				<a href="new_process.php" class="btn" style="background-color:#0A1551; color:white; float:right;">ADD NEW PROCESS</a><br>
				 				
				 				<input type="radio" name="process_name" value="HDFC ERGO,vinod.anand@silaris.in,Vinod Anand" required>
								<label >HDFC ERGO</label><br>
								<input type="radio" name="process_name" value="MAX LIFE,vinod.anand@silaris.in,Vinod Anand">
								<label >MAX LIFE</label><br>
								<input type="radio" name="process_name" value="AMEX EDM,vinod.anand@silaris.in,Vinod Anand">
								<label >AMEX EDM</label><br>
								<input type="radio" name="process_name" value="TATA AIA,vinod.anand@silaris.in,Vinod Anand">
								<label >TATA AIA</label><br>
								<input type="radio" name="process_name" value="SBI FLEXI,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI FLEXI</label><br>
								<input type="radio" name="process_name" value="SBI ENCASH,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI ENCASH</label><br>
								<input type="radio" name="process_name" value="SBI UPGRADE,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI UPGRADE</label><br>
								<input type="radio" name="process_name" value="SBI ADD ON,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI ADD ON</label><br>
								<input type="radio" name="process_name" value="SBI CPP TM,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI CPP TM</label><br>
								<input type="radio" name="process_name" value="VOLTAS,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >VOLTAS</label><br>
								
								<input type="radio" name="process_name" value="IHO,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >IHO</label><br>
								<input type="radio" name="process_name" value="SKYWORTH,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SKYWORTH</label><br>
								
								<input type="radio" name="process_name" value="SBI BT,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >SBI BT</label><br>
								<input type="radio" id="css" name="process_name" value="RSA,puneet.bhutani@silaris.in,Puneet Bhutani">
								<label >RSA</label><br>
								
								<input type="radio" name="process_name" value="HSBC,anu.wig@silaris.in,Anu Wig">
								<label >HSBC</label><br>
								<input type="radio"  name="process_name" value="HSBC CANARA,anu.wig@silaris.in,Anu Wig">
								<label >HSBC CANARA</label><br>
								
								<input type="radio" name="process_name" value="CPP POS,prashant.arora@silaris.in,Prashant Arora">
								<label >CPP POS</label><br>
								
              					<input type="radio" name="process_name" value="MAX INBOUND,vinod.anand@silaris.in,Vinod Anand">
								<label >MAX INBOUND</label><br>
								<?php
								$psql = "SELECT * FROM `new_processes`";
								$pres=mysqli_query($conn,$psql);
								$count=mysqli_num_rows($pres);
								if ($count!=0)
								{
								
								while($prow = mysqli_fetch_array($pres))
								{
									$pn1=$prow['process_name'];
									$avp=$prow['process_avp_name'];
									$avp_email=$prow['avp_email'];

									?>
								<input type="radio" name="process_name" value="<?php echo $pn1.','.$avp_email.','.$avp?>">
								<label ><?php echo $pn1 ?></label><br>
								<?php 
							    } }


								?>
							

    		  <br><div class="form-group text-center">
    		   		<input class="btn" style="background-color:#0A1551; color:white" type="submit" name="sub" value="SUBMIT">
						
			</form>
			
		</div>

</div>


<?php
include('footer.php');
?>