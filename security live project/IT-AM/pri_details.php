<?php
include('header.php');


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

			<?php 
			$process=$_GET['id'];
			 ?> 
			
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
				<table class="table table-bordered table-striped table-hover">
					<h2 class="text-center float-left" style="color:#0A1551">PRI Tracker</h2><br>
			  <hr size="8" width="100%" color="#23262C">

			<form class="" method="POST" action="" enctype="multipart/form-data">
			
				<div class="container">
					
						
				<div class="row" >
					
							<label style="font-size:17px"><font color="#0A1551"><strong> Filter</strong></font> </label>
							<select id="choice" style="margin-left:10px;margin-right:100px;border-radius:10px;padding:10px" onchange="showprovider(this.value)" required>
					 			<option value="" selected hidden>Please provide your Input.....</option>
								 <option value="Provided by Client,Provided by Silaris,<?php echo $process?>">All</option>
  								 <option value="Provided by Client, ,<?php echo $process?>">Client Provided PRI</option>
  								 <option value="Provided by Silaris, ,<?php echo $process?>">Silaris Provided PRI</option>
  							</select>
  					  
  					</div>
				</div>
			</div>
			
			</form><br>

	
		<div id="txtHint">PRI info will be listed here...</div>			
<script>
function showprovider(str) {
  var xhttp;    
 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "table_pri.php?id="+str, true);
  xhttp.send();
}



</script>
<?php
include('footer.php');
?>