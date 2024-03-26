<?php
session_start();
include('../config.php');
include('checkin.php');
admin();
$ademail = $_SESSION['ademail'];
$adname = $_SESSION['adname'];
$adid = $_SESSION['adid'];
$adpost = $_SESSION['adpost'];
?>

<?php

header('Content-type:application/vnd-ms-excel');
$filename = "Laptop-Data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
					<tr bgcolor="skyblue">
						<td>S.No</td>
              			<td>Category</td>
						<td>Employee Name</td>
						<td>Employee ID</td>
						<td>Designation</td>
						<td>Process</td>
						<td>Laptop Name</td>
						<td>Serial No</td>
						<td>Issue Date</td>
						<td>Issue Notes</td>
						<td>Return Date</td>
						<td>Return Notes</td>
              			
              			
					</tr>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_laptop` WHERE sc_status='1'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['sc_lapcategory'];?></td>
									<td><?php echo $trow['sc_fullname'];?></td>
                                    <td><?php echo $trow['sc_empind'];?></td>
                                    <td><?php echo $trow['sc_emdpost'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
                                    <td><?php echo $trow['sc_lapname'];?></td>
                                    <td><?php echo $trow['sc_lapserialno'];?></td>
                                    <td><?php echo $trow['sc_issuedate'];?></td>
                                    <td><?php echo $trow['sc_issuenotes'];?></td>
                                    <td><?php echo $trow['sc_returndate'];?></td>
                                    <td><?php echo $trow['sc_returnnotes'];?></td>
                                    
								</tr>
								<?php
								$num++;
							}
						?>
						
					
				</table>