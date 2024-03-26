<?php
include('header.php');
include_once("../emailconfig.php");
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
			        <a class="nav-link" target="_blank" href="excel/isms-employee-data-formate.csv">Employee Formate</a>
			      </li>
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
			<h2>ISMS Session Topic :-</h2>
            <p>Session has been given by ISMS Officer  and below mention are the policies which are covered,<br>Once test will be done then result will appear into Trainer Portal.</p>
			<ol>
  				<li>Physical Security Policy.</li>
  				<li>Privacy Policy.</li>
  				<li>HR Policy.</li>
            	<li>External Privacy Policy.</li>
  				<li>Access Control Policy.</li>
  				<li>Password Policy.</li>
            	<li>Whistle Blower Policy.</li>
  				<li>Acceptable Usage Policy.</li>
  				<li>Information Security Policy.</li>
            	<li>Cyber Security Policy.</li>
			</ol> 
		</div>
	</div>
   


<?php
include('footer.php');
?>