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
			        <a class="nav-link" href="#">Employee Formate</a>
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
 <?php
                        
                        
                        
    if (isset($_POST['add_id'])) {
    
    

        $employee_id=$_POST['employee'];
        
    


       
           $sql = "UPDATE `sc_batch_trainee` SET `employee_id`='$employee_id' WHERE id= $_GET[id] ";
            $sql_run = $conn->query($sql);
    
    if($sql_run){

    
    echo '
     <script>
     alert("added");
    // window.location.href="view-isms-details.php";
    </script>
    
    ';
    
    }
       
    }

                        
                        
                        ?>
	

  			
	
<div class="" id="internal1">
	<div class="infernal-disp">
		<form class="" method="POST" action="" enctype="multipart/form-data">
			
			<div class="form-group row">
				
                <div class="col-lg-6 col-md-6">
					<label>Agent Employee ID</label>
				<input type="text" name="employee" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="add_id" class="btn btn-dark" value="Submit">
				<button id="closeform1" class="btn btn-danger ml-2">Close</button>
			</div>
		</form>
	</div>
</div>
<?php
include('footer.php');
?>