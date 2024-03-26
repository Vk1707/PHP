<?php
include('header.php');
include_once("../emailconfig.php");
?>
<?php
if(isset($_GET['batch']))
{
	
	
$batch_id= $_GET['batch'];
}
else{ 

echo "<script>window.location.href='./isms-test-request.php'</script>";

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
			<form method="post" action="" enctype="multipart/form-data">
  				<label for="file">File</label>
  				<input id="file" name="file" type="file" />
  				<button type="submit" name="Import">Upload</button>
			</form>
              <br>
			<div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead class="bgsky">
						<td>S.No</td>
              			<td>Date</td>
						<td>Batch No.</td>
						<td>Employee Name</td>
              			<td>Process/Dept.</td>
						<td>Designation</td>
              			<td>D.O.J</td>
						<td>Employee Tem ID</td>
              			<td>Session Date</td>
              			<td>Session Time</td>
              			<td>Location</td>
              			<td>Attendence</td>
              			<td>Exam Result</td>
              			<td>Status</td>
              			
              
					</thead>
					<tbody>
							<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_batch_trainee` WHERE trainee_batch_id='$batch_id'";

							$tres = mysqli_query($conn,$tsql);
if(mysqli_num_rows($tres)>0){
							while($trow = mysqli_fetch_array($tres))
							{

                            
								?>
									<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['created_date'];?></td>
                                    <td><?php echo $trow['trainee_batch_id'];?></td>
                                    <td><?php echo $trow['trainee_name'];?></td>
                                    <td><?php echo $trow['trainee_process'];?></td>
                                    <td><?php echo $trow['trainee_designation'];?></td>
                                    <td><?php echo $trow['trainee_doj'];?></td>
                                    <td><?php echo "ISMSTMP".$trow['id'];?></td>
                                    
									<td><?php echo $trow['session_date'];?></td>
                                    <td><?php echo $trow['session_time'];?></td>
                                    <td><?php echo $trow['remarks'];?></td>	
                                     <td><?php echo  $trow['attendence'] == 1 ? 'PRESENT': 'N/A' ?></td>
                                     <td>
                                    
                                    
                                    <?php 
                                    
                                    $qry_res= "SELECT * FROM `sc_test` WHERE empid=$trow[id]";
                            $qry_res_run= $conn->query($qry_res);
                            
                            if($qry_res_run){
                            
                            if( mysqli_num_rows($qry_res_run)>0){
                            
                            $result_data= mysqli_fetch_assoc($qry_res_run);
                                $data_array=($result_data['que_array']); 	
                            $data_array= unserialize($data_array);

                            

                            $total= 0;
                            foreach($data_array as $values){

                            if($values==1){
                            
                            $total = $total+$values;
                            
                            }
                            
                            }
                            
                            if($total>9){
                            echo $total." - PASS";
                            
                            }
                            else{
                            echo $total." - FAIL";
                            
                            }

                            
                            }
                            }
                                    
                                    ?>
                                    
                                   </td>
                                    <td><?php echo $trow['status'];?></td>
									
                                    
                                    
                                    	
							 	 										
								</tr>
								<?php
								$num++;
							}
}
else{
echo "No Data Found"; }
						?>
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	

               <?php
                        
                        
 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into sc_batch_trainee (trainee_batch_id,trainee_name,trainee_process,trainee_designation,trainee_type,trainee_doj) 
                   values ('".$_GET['batch']."','".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[4]."','".$getData[3]."')";
                   $result = mysqli_query($conn, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"view-isms-details.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"view-isms-details.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  }   
 ?>
                        ?>         
                        
<?php
include('footer.php');
?>