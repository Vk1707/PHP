<?php
session_start();
include('../config.php');
$ademail = $_SESSION['ademail'];
?>
<?php
header('Content-type:application/vnd-ms-excel');
$filename ="incident-report.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>
	
<table border="1">
	<thead>
		<td>S.No</td>
		<td>Ticket ID</td>
		<td>Date || Time</td>
		<td>Name</td>
		<td>Email ID</td>
		<td>Process</td>
		<td>Main Incident</td>
		<td>Sub Incident</td>
		<td>Details</td>
		<td>Solution</td>
		<td>Data || Time</td>
		<td>Status</td>
		
	</thead>
	<tbody>
		<?php
		$tnum = 1;
		$ttsql = "SELECT * FROM `sc_security` WHERE sc_status IN ('1','2') AND sc_createdby='$ademail' ORDER BY sc_sno DESC";
			$ttres = mysqli_query($conn,$ttsql);
			while($ttrow = mysqli_fetch_array($ttres))
			{
				?>
				<tr>
					<td><?php echo $tnum;?></td>
					<td><?php echo $ttrow['sc_ticketid'];?></td>
					<td><?php echo $ttrow['sc_createdon'];?></td>
					<td><?php echo $ttrow['sc_name'];?></td>
					<td><?php echo $ttrow['sc_emailid'];?></td>
					<td><?php echo $ttrow['sc_emprocss'];?></td>
					<td><?php echo $ttrow['sc_mainpage'];?></td>
					<td><?php echo $ttrow['sc_subpage'];?></td>
					<td><?php echo $ttrow['sc_details'];?></td>
					<td><?php echo $ttrow['sc_solution'];?></td>
					<td><?php echo $ttrow['sc_solutionat'];?></td>
					<?php 
					$melt = $ttrow['sc_status'];
					switch($melt)
					{
						case"1":
						echo "<td>Pending</td>";
						break;
						case"2":
						echo "<td>Complete</td>";
						break;

					}

					?>
					
				</tr>
				<?php
				$tnum++;
			}
			?>
	</tbody>
</table>

