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
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="row">
						<div class="col-lg-6">
							<div class="dis-card">
								<div class="dis-top clearfix">
									<div class="dis-icon float-left">
									<i class="fa fa-ticket"></i>
									</div>
									<div class="dis-right float-right">
										<a href="create-ticket.php" class=""><i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<div class="dis-body">
									<p>Create Ticket </p>
								</div>
								<div class="dis-foot"></div>

							</div>
						</div>
						<div class="col-lg-6">
							<div class="dis-card">
								<div class="dis-top clearfix">
									<div class="dis-icon float-left">
									<i class="fa fa-eye"></i>
									</div>
									<div class="dis-right float-right">
										<a href="view-tickets.php" class=""><i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<div class="dis-body">
									<p>View Tickets </p>
								</div>
								<div class="dis-foot"></div>

							</div>
						</div>
					</div>
					<div class="row">
				
						<div class="col-lg-6 mt-4">
							<div class="dis-card">
								<div class="dis-top clearfix">
									<div class="dis-icon float-left">
									<i class="fa fa-download"></i>
									</div>
									<div class="dis-right float-right">
										<a href="incident-record.php" class=""><i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<div class="dis-body">
									<p>Export Data</p>
								</div>
								<div class="dis-foot"></div>

							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
	</div>
<script>
var xValues = ["Complete", "Pending","Total Tickets"];
<?php 
	$tms = "SELECT * FROM `sc_security` WHERE sc_status='2'";
	$tse = mysqli_query($conn,$tms);
	$tct = mysqli_num_rows($tse);

	$tps = "SELECT * FROM `sc_security` WHERE sc_status='1'";
	$tpe = mysqli_query($conn,$tps);
	$tpt = mysqli_num_rows($tpe);

	$tts = "SELECT * FROM `sc_security`";
	$tte = mysqli_query($conn,$tts);
	$ttt = mysqli_num_rows($tte);
?>
var yValues = [<?php echo $tct;?>, <?php echo $tpt;?>, <?php echo $ttt;?>];
var barColors = [
  "#50c109",
  "#ffd400",
  "#tanay"
  
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Incident Report Graph"
    }
  }
});
</script>
<?php
include('footer.php');
?>