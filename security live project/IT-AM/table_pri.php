<?php
include('header.php');


?>

<?php
						    
				$id=$_GET['id'];
				$v=explode(',', $id);
						
				$tsql = "SELECT * FROM `pri_tracker` where process_name='$v[2]' AND (provided_by='$v[0]' OR provided_by='$v[1]')  order by sr_no desc";
				$tres=mysqli_query($conn,$tsql);
				$count=mysqli_num_rows($tres);
				$num=1;
				?>

<form class="form-group">
<label style="font-size:17px"><font color="#0A1551"><strong>Row Count</strong></font> </label> <input type="text" value="<?php echo $count;?>" style="width:50px;border-radius:10px" readonly> 
</form>

			
			
			<div class="table-wrapper-scroll-y  table-responsive">
				<table class="table table-bordered table-striped table-hover">
					
			 
					<thead class="bgsky">
						<th>S.No</th>
						<th>PRI Provided By</th>
						<th>PRI Receiving Date</th>
						<th>PRI Request Received On</th>
						<th>PRI Number</th>		
						<th>Type</th>
						<th>Owner Name</th>
						<th>Activation Date</th>
						<th>Allocation Date</th>
						<th>Gateway IP</th>
						<th>Port</th>		
						<th>In/Out</th>
						<th>Billing To</th>
						<th>DNC/NDNC</th>
						<th>Dialer</th>
						<th>Prefix</th>
						<th>Process Name</th>
						<th>Updated Via</th>
						<th>Move</th>
						
					</thead>
					<tbody>
						<?php
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									<td><?php echo $trow['provided_by'];?></td>
									<td><?php echo $trow['client_pri_rec_date'];?></td>
									<td><?php echo $trow['request_date'];?></td>

									
									<?php
									if ($trow['owner_name']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['pri_number'];
										$pn=$trow['process_name'];
										echo $p; ?><br><a href='update_pri_tracker_manual_existing.php?id=<?php echo $p?>&pn=<?php echo $pn;?>'>Click here to Update</td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['pri_number'];?></td>

									<?php } ?>
									<td><?php echo $trow['type'];?></td>
									<?php 
									if($trow['owner_name']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['owner_name'];?></font></td>
									<?php } 
									else{
									?>
									<td><?php echo $trow['owner_name'];?></td>
								<?php } 
								   if($trow['activation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['activation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['activation_date'];?></td>
								     <?php } 
									 if($trow['allocation_date']=="0000-00-00")
									{?>
									<td><font color="red"><?php echo $trow['allocation_date'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['allocation_date'];?></td>
								     <?php } 
									 if($trow['gateway_ip']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['gateway_ip'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['gateway_ip'];?></td>
								     <?php } 
									if($trow['port']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['port'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['port'];?></td>
								     <?php } 
									if($trow['in_out']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['in_out'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['in_out'];?></td>
								     <?php } 
									if($trow['billing_to']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['billing_to'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['billing_to'];?></td>
								     <?php } 
									if($trow['dnc_ndnc']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['dnc_ndnc'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['dnc_ndnc'];?></td>
								     <?php } 
									if($trow['dialer']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['dialer'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['dialer'];?></td>
								     <?php } 
									if($trow['prefix']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['prefix'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['prefix'];?></td>
								     <?php } ?>
									
									<td><?php echo $trow['process_name'];?></td>
									 <?php 
									if($trow['updated_thrg']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['updated_thrg'];?></font></td>
									<?php } 
								    else 
								    { ?>
									<td><?php echo $trow['updated_thrg'];?></td>
								     <?php } ?>
									
									<td><a href="move_pri.php?p=<?php echo $trow['pri_number'];?>">MOVE PRI</td>
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						<tr> 
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	</div>
</div>
<?php
include('footer.php');
?>