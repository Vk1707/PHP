<?php
session_start();
include('../config.php');

$ademail = $_SESSION['ademail'];

?>
<?php
if(isset($_GET['id']))
{
$tid = $_GET['id'];
header('Content-type:application/vnd-ms-words');
$filename = $tid."_pri_sim_request.doc";
header("Content-Disposition:attachment;filename=\"$filename\"");
}
?>
<table style="width:100%">
	<tr>
<td> <h5 style="color:red"> ISMS_DOC_094 </h5></td><td style="text-align:right"> </td></tr>
</table>
<hr style="color:red">
<br>
<table style="width:100%">
	
	<tr style="background-color:#00308F;padding:5px;border:5px solid black;text-align:center;">
		<h2 style="color:#fff;font-family:arial;">PRI/SIM Card Request Form</h2>
	</tr>

</table>


		<?php
				if(isset($_GET['id']))
				{
					$tid = $_GET['id'];
					$met = "SELECT * FROM `pri_sim_request` WHERE ticket_no='$tid'";
					$cet = mysqli_query($conn,$met);
					$ret = mysqli_fetch_array($cet);

				}
			?>

		
		<table style="width:40%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Date of Request</td>
				<td><?php echo $ret['request_date'];?></td>
			</tr>
		</table>
 	  
 	    <div> 
		<h3 style="font-weight:bold; color:#00308F;">Employee Details(who raised this request)</h3>
	</div>

		<table style="width:100%" border="1">
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F; width:50%">Employee Name</td>
				<td><?php echo $ret['emp_name'];?></td>
			</tr>
			
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Designation</td>
				<td><?php echo $ret['designation'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Requirement(SIM/PRI) </td>
				<td><?php echo $ret['requirement'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Type of SIM Required</td>
				<td><?php echo $ret['sim_details'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Required SIM Count</td>
				<td><?php echo $ret['sim_count'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Type of PRI Required</td>
				<td><?php echo $ret['pri_140_details'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Required PRI Count</td>
				<td><?php echo $ret['pri_140_count'];?></td>
			</tr>
		
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Cost Centre (Silaris or Client)</td>
				<td><?php echo $ret['cost_center'];?></td>
			</tr>
			<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Dept. / Process Name:</td>
				<td><?php echo $ret['process_name'];?></td>
			</tr>
		
				<tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Existing PRI 140 Count</td>
				<td><?php echo $ret['existing_pri140_count'];?></td>
			</tr>
                <tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Existing Normal PRI Count</td>
				<td><?php echo $ret['existing_normal_pri_count'];?></td>
			</tr>
                <tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">Existing SIM Count</td>
				<td><?php echo $ret['existing_sim_count'];?></td>
			</tr>
             <tr style="padding:2px 0px 2px 2px;">
				<td style="font-weight:bold; color:#00308F;">PRI Request Reason(Expansion/Replacement/New Process)</td>
				<td><?php echo $ret['pri_req_reason'];?></td>
			</tr>
		</table>

		
	</table><br><br><br><br><br><br>

	<h3><u>Feedback</u></h3><br><br>
	<table style="width:100%">
	<tr>

		<td style="margin-left:60px"> <strong> <?php echo $ret['avp_feedback'];?></strong></td>
		
		<td style="margin-left:60px"><strong><?php echo $ret['cio_feedback'];?></strong></td>
		
		<td style="margin-left:60px"> <strong><?php echo $ret['ceo_feedback'];?></strong></td>
		
	</tr>
	<tr>

		
		<td> <hr style="color:black; width: 70%;"> </td>
		
		<td> <hr style="color:black; width: 70%;"> </td>
		
		<td> <hr style="color:black; width: 70%;"> </td>
	</tr>
	<tr>
		<td style="text-align:center;"> (AVP)  </td>
		<td style="text-align:center;">(CIO) </td>
		<td style="text-align:center;"> (CEO)  </td>
	</tr>
</table>


			
		

