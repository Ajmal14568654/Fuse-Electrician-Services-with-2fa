<?php
	define('TITLE','Checkstatus');
	define('PAGE','CheckStatus');
	echo'<div class="d-print-none">';
	include('includes/header.php');
	echo'</div>';
	include('../dbConnection.php');
	
	
?>
		<!--Start Container-->
		<div class="container-fluid">
			<div class="row"><!--Start Row-->
				<?php include('includes/sidebar.php');  ?>
				<!--Start 2nd Column-->
				<div class="col-sm-9 col-md-10 px-2 py-5 px-3 maincontentheight">
					<form action="" method="POST" class="form-inline d-print-none">
						<div class="form-group mr-3">
							<label for="checkid">Enter Request ID: </label>
							<!-- <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)"> -->
							<select name="checkid" class="form-control">
								<option value="">Select Your Request Id</option>
								<?php
									$sqlquery ="SELECT request_id FROM submitrequest2_tb WHERE current_email = '$rEmail'";
									$result = mysqli_query($conn,$sqlquery);
									while($row =mysqli_fetch_assoc($result)){
										echo"<option value=' ".$row['request_id']."'>".$row['request_id']."</option>";
									}
								?>
							</select>
						</div>
						<button type="Submit" class="btn btn-primary mt-3">Search</button>
					</form>
					<?php 
						if(isset($_REQUEST['checkid']))
						{
							$sql ="SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
							$result = $conn ->query($sql);
							$row = $result->fetch_assoc();
							if (isset($row['request_id']) && $row['request_id'] == $_REQUEST['checkid'])
							{
								
							
						
					?>
					<h3 class="text-center mt-3">Assign Work Details</h3>
					<table class="table table-bordered">
						<tbody>
								<tr>
									<td>Request ID</td>
									<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
								</tr>
								<tr>
									<td>Request Info</td>
									<td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
								</tr>
								<tr>
									<td>Request Description</td>
									<td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
								</tr>
								<tr>
									<td>Name</td>
									<td><?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?></td>
								</tr>
								<tr>
									<td>Address Line 1</td>
									<td><?php if(isset($row['requester_add1'])){echo $row['requester_add1'];} ?></td>
								</tr>
								<tr>
									<td>Address Line 2</td>
									<td><?php if(isset($row['requester_add2'])){echo $row['requester_add2'];} ?></td>
								</tr>
								<tr>
									<td>City</td>
									<td><?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?></td>
								</tr>
								<tr>
									<td>State</td>
									<td><?php if(isset($row['requester_state'])){echo $row['requester_state'];} ?></td>
								</tr>
								<tr>
									<td>Pin Code</td>
									<td><?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php if(isset($row['requester_email'])){echo $row['requester_email'];} ?></td>
								</tr>
								<tr>
									<td>Mobile</td>
									<td><?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?></td>
								</tr>
								<tr>
									<td>Assigned Date</td>
									<td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
								</tr>
								<tr>
									<td>Technician Name</td>
									<td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
								</tr>
								<tr>
									<td>Customer Sign</td>
									<td></td>
								</tr>
								<tr>
									<td>Technician Sign</td>
									<td></td>
								</tr>
						</tbody>
					</table>
					<div class="text-center">
						<form action="" class="mb-3">
							<input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
							<input type="submit" class="btn btn-secondary" value="close">
						</form>
					</div>
					<?php
						}


						else
						{
							
							echo'<div class="alert alert-info mt-4">Your Request is Still Pending</div>';
						}	
						}
					?>
				</div>
				<!--End 2nd Column-->
				
			</div><!--End Row-->
		</div><!--End Container-->
		<!--End Side Bar -->
		<!--Only Number for Input Fields-->
		
<?php
include('includes/footer.php');
?>