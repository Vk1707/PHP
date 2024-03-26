<div class="sidebar-menu">
	<img src="../assets/img/ismslogo-dash.png" class="img-fluid">
	<ul class="side-list">
		<li><a href="dashboard.php" ><i class="fa fa-dashboard"></i> Dashboard</a></li>
		
		<li><a href="email-request.php"><i class="fa fa-envelope"></i> Email Request</a></li>
		<?php
						if(($ademail == "rajesh.bisht@silaris.in") OR ($ademail == "pinaki.narendra@silaris.in"))
						{
							?>
							<li><a href="ccrm.php"><i class="fa fa-globe"></i> CCRM Request</a></li>
							<?php
						}
							?>
		
		<li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-history"></i> History</a>
				<div class="dropdown-menu">
        			<a class="dropdown-item" href="history.php"> <i class="fa fa-history"></i> Creation History</a>
        			<a class="dropdown-item" href="access-history.php"> <i class="fa fa-history"></i> Access History</a>
        			
      			</div>
		</li>
		<li><a href="incident-manage.php"><i class="fa fa-globe"></i> Incident Management</a></li>
		<li><a href="wifi-access.php"><i class="fa fa-wifi"></i> WiFi Access</a></li>
       <li><a href="website-access.php"><i class="fa fa-globe"></i> Website Access</a></li>
       
	</ul>
</div>