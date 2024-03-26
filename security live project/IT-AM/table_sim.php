<?php
include('header.php');


?>
			
<?php
						    
				 $id=$_GET['id'];
				  $v=explode(',', $id);
						 
				$tsql = "SELECT * FROM `sim_tracker` where process='$v[2]' AND (provided_by='$v[0]' OR provided_by='$v[1]') order by sr_no desc";
				$tres=mysqli_query($conn,$tsql);

				$count=mysqli_num_rows($tres);
				$num=1;?>

<form class="form-group">
<label style="font-size:17px"><font color="#0A1551"><strong>Row Count</strong></font> </label> <input type="text" value="<?php echo $count;?>" style="width:50px;border-radius:10px" readonly> 
</form>
	

			<div class="table-wrapper-scroll-y table-responsive" >
				<table class="table table-bordered table-striped table-hover">
					
			 
	
	
					<thead class="bgsky">
						<th>S.No</th>
						<th>SIM Provided By</th>
						<th>SIM Receiving Date(for Client provided SIMs)</th>
						<th>SIM Request Received On(for Silaris Provided SIMs)</th>
						<th>SIM Number</th>	
						<th>Mobile Number</th>	
						<th>SIM Type</th>
						<th>Process Name</th>
						<th>Activation Date</th>
						<th>Allocation Date</th>
						<th>Gateway IP</th>
						<th>Port</th>		
						<th>Updated Via</th>
						
						
					</thead>
					
					<tbody >
						

						<?php 
							while($trow = mysqli_fetch_array($tres))
							{
								
								?>
								<tr>

									<td><?php echo $num;?></td>
									
									<td><?php echo $trow['provided_by'];?></td>
									<td><?php echo $trow['received_on'];?></td>
									<td><?php echo $trow['request_date'];?></td>

									
									<?php
									if ($trow['mobile_number']=="Not Updated")
									{ ?>
										<td><?php 

										$p=$trow['sim_number'];
										$pn=$trow['process'];
										echo $p; ?><br><a href='update_sim_tracker_existing.php?id=<?php echo $p?>&pn=<?php echo $pn;?>'>Click here to Update</td>
									<?php 		
									}

									else
									{

									?>
									<td><?php echo $trow['sim_number'];?></td>

									<?php } ?>
									
									<?php 
									if($trow['mobile_number']=="Not Updated")
									{?>
									<td><font color="red"><?php echo $trow['mobile_number'];?></font></td>
									<?php } 
									else{
									?>
									<td><?php echo $trow['mobile_number'];?></td>
									<?php } ?>
									<td><?php echo $trow['sim_type'];?></td>
									<td><?php echo $trow['process'];?></td>
								 <?php 
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
								     <?php } ?>
									<td><?php echo $trow['updated_thrg'];?></td>
									 
								
									
								</tr>
								<?php
							
							$num++;
							
							}
						?>
						
							
						</tr>
					</tbody>
				</div>
				
					
				</div>
				</table>
			</div>
		</div>
	</div>

	</div>
</div>



<?php
include('footer.php');
?>