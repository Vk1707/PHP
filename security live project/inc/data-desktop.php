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
$filename = "Desktop-Data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>
<table border="1">
					<tr bgcolor="skyblue">
						<td>S.No</td>
              			<td>Date || Time</td>
						<td>LOCATION</td>
						<td>DEPARTMENT</td>
						<td>PROCESS</td>
						<td>SUB PROCESS</td>
						<td>NO OF WORK STATIONS</td>
						<td>NO OF SYSTEMS</td>
						<td>SYSTEMS WORKING</td>
						<td>SYSTEMS NOT WORKING</td>
						<td>PROCESS MANAGER</td>
						<td>EXTRA HARDWARE</td>
              			
					</tr>
						<?php
						$num =1;
							$tsql = "SELECT * FROM `sc_desktop` WHERE sc_status='1'";
							$tres = mysqli_query($conn,$tsql);
							while($trow = mysqli_fetch_array($tres))
							{
								?>
								<tr>
									<td><?php echo $num;?></td>
                                    <td><?php echo $trow['sc_createdon'];?></td>
									<td><?php echo $trow['sc_location'];?></td>
                                    <td><?php echo $trow['sc_department'];?></td>
                                    <td><?php echo $trow['sc_process'];?></td>
                                    <td><?php echo $trow['sc_subprocess'];?></td>
                                    <td><?php echo $trow['sc_wrokstation'];?></td>
                                    <td><?php echo $trow['sc_systemsno'];?></td>
                                    <td><?php echo $trow['sc_workingsystem'];?></td>
                                    <td><?php echo $trow['sc_notworking'];?></td>
                                    <td><?php echo $trow['sc_processmanger'];?></td>
                                    <td><?php echo $trow['sc_extrahardware'];?></td>
                                    
								</tr>
								<?php
								$num++;
							}
						?>
						
					
				</table>