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
<style type="text/css">
	.td
	{
		font-family: ;
	}
</style>
<?php
if(isset($_GET['tid']))
{
	$tid = $_GET['tid'];
header('Content-type:application/vnd-ms-words');
$filename = $tid."_incident.doc";
header("Content-Disposition:attachment;filename=\"$filename\"");
}
?>
<table style="width:100%">
	
	<tr style="background-color:#00308F;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#fff;font-family:arial;">Incident Report</h2>
	</tr>

</table>
<br>
<br>
<br>

		<table border='1'>
			<tr>
				<th>Incident Priority</th>
				<th>Incident Category</th>
				<th>Ticket No</th>
				<th>Incident Start Date & Time</th>
				<th>Incident Closure Date & time</th>
			</tr>
			<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$met = "SELECT * FROM `sc_incireport` WHERE sc_ticketno='$tid'";
					$cet = mysqli_query($conn,$met);
					$ret = mysqli_fetch_array($cet);

				}
			?>
			<tr>
				<td><?php echo $ret['sc_priority'];?></td>
				<td><?php echo $ret['sc_category'];?></td>
				<td><?php echo $ret['sc_ticketno'];?></td>
				<td><?php echo $ret['sc_startdate'];?></td>
				<td><?php echo $ret['sc_closetime'];?></td>

			</tr>
		</table>
		<br>
		<br>
		<br>
		<table style="width:100%" border="1">
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Issue Reported By</td>
				<td><?php echo $ret['sc_issueby'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Incident Details</td>
				<td><?php echo $ret['sc_incidetail'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Investigation Details</td>
				<td><?php echo $ret['sc_investidetail'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">RCA</td>
				<td><?php echo $ret['sc_rca'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Action Taken</td>
				<td><?php echo $ret['sc_actionteken'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Incident Investigate By</td>
				<td><?php echo $ret['sc_invenstiby'];?></td>
			</tr>
			<tr style="padding:20px 0px 20px 10px;">
				<td style="font-weight:bold">Incident Approved By</td>
				<td><?php echo $ret['sc_approvedby'];?></td>
			</tr>
		</table>
<br>
<br>
<br>
<br>
<br>
<hr>
<table style="width:100%">
		<tr style="text-align:center">
		<h3>Silaris Informations Pvt Ltd</h3>
		
	</tr>
	<tr style="text-align:center">
		<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
	</tr>	
</table>
