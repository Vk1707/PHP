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
$filename = $tid."_wifiaccess.doc";
header("Content-Disposition:attachment;filename=\"$filename\"");
}
?>
<table style="width:100%">
	
	<tr style="background-color:#00308F;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#fff;font-family:arial;">Wifi Request Form</h2>
	</tr>

</table>
<br>
<br>
		<?php
				if(isset($_GET['tid']))
				{
					$tid = $_GET['tid'];
					$met = "SELECT * FROM `sc_wifiaccess` WHERE sc_sno='$tid'";
					$cet = mysqli_query($conn,$met);
					$ret = mysqli_fetch_array($cet);

				}
			?>

		
		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Name</td>
				<td><?php echo $ret['sc_wifiname'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Designation</td>
				<td><?php echo $ret['sc_wifidesinations'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Process / Dept</td>
				<td><?php echo $ret['sc_wifiprocess'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Guest/ Client/Internal employee</td>
				<td><?php echo $ret['sc_wifiguest'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Employee ID (if internal employee)</td>
				<td><?php echo $ret['sc_wifiempid'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Desktop/Laptop user</td>
				<td><?php echo $ret['sc_wifiassets'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">System MAC Address</td>
				<td><?php echo $ret['sc_wifisystem'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Date</td>
				<td><?php echo $ret['sc_wifidate'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold">Time Period of Internet Access</td>
				<td><?php echo $ret['sc_wifiperiod'];?></td>
			</tr>
			
		</table>
<br>


<table style="width:100%" border="1">
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Er. Tanay Dobhal <br><small>Information Security Officer [ISMS]</small>
</td>
		<td><?php 
			if($ret['sc_wifisms'] == "1")
			{
				echo "Granted";
			}
			else
			{
				echo "";
			}
		?></td>
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
