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
$filename = $tid."_ccrm.doc";
header("Content-Disposition:attachment;filename=\"$filename\"");
}
?>
<table style="width:100%">
	
	<tr style="background-color:#00308F;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#fff;font-family:arial;">Change Control Request Form</h2>
	</tr>

</table>
<br>
<br>


		<table border='1' style="width:100%">
			<tr>
				<th>Priority</th>
				<th>CCR Number</th>
				<th>CCR Date & Time</th>
				<th>Type of Change</th>
				
			</tr>
			<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$met = "SELECT * FROM `sc_ccrmdata` WHERE sc_sno='$tid'";
					$cet = mysqli_query($conn,$met);
					$ret = mysqli_fetch_array($cet);

				}
			?>
			<tr>
				<td><?php echo $ret['sc_priority'];?></td>
				<td><?php echo $ret['sc_ccrmno'];?></td>
				<td><?php echo $ret['sc_ccrmdate'];?></td>
				<td><?php echo $ret['sc_typeofchange'];?></td>
				

			</tr>
		</table>
		<br>
		
		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Location</td>
				<td><?php echo $ret['sc_location'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Description of Change</td>
				<td><?php echo $ret['sc_description'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Nature of Change</td>
				<td><?php echo $ret['sc_natureofchange'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Start Date & Time</td>
				<td><?php echo $ret['sc_startdate'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Expected Date & Time</td>
				<td><?php echo $ret['sc_expectedate'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Information Security Impact</td>
				<td><?php echo $ret['sc_ismsimpact'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Possible Impact Detail</td>
				<td><?php echo $ret['sc_possibleimpact'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Security Impact Approved By</td>
				<td><?php echo $ret['sc_ismsapprove'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Purpose for the changes</td>
				<td><?php echo $ret['sc_purposeofchange'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Process Owner</td>
				<td><?php echo $ret['sc_porocessowner'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Owner</td>
				<td><?php echo $ret['sc_owner'];?></td>
			</tr>
		</table>
<br>

<table style="width:100%">
	<tr style="padding:2px 0px 2px 2px;">
		<td><?php echo $ret['sc_fulldescription'];?></td>
	</tr>
</table>
<br>
<table style="width:100%" border="1">
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Will this change cause an outage to customer/business?</td>
		<td><?php echo $ret['sc_custmbusiness'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Regression procedure (In case of failure due to changes made)</td>
		<td><?php echo $ret['sc_regression'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Required time to back out</td>
		<td><?php echo $ret['sc_backout'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Potential Impact if the change fails</td>
		<td><?php echo $ret['sc_potenial'];?></td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Proposed change conflicting with any other planned change for the same day</td>
		<td><?php echo $ret['sc_conflicting'];?></td>
	</tr>
</table>
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
