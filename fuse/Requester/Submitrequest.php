<?php
	define('TITLE','Submit Request');
	define('PAGE','SubmitRequest');
	include('includes/header.php');
	include('../dbConnection.php');
	if(isset($_REQUEST['submitrequest']))
	{
		//checking for empty fields.
		if(($_REQUEST['requestinfo']) == "" || ($_REQUEST['requestdesc'] == "") ||($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "")  || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] =="") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesterstate'] =="") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requesterdate'] == ""))                                                                                                                                                                           
		{
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required.</div>';
		}
		else
		{
			$rinfo   = $_REQUEST['requestinfo'];
			$rdesc   = $_REQUEST['requestdesc'];
			$rname   = $_REQUEST['requestername'];
			$radd1   = $_REQUEST['requesteradd1'];
			$radd2   = $_REQUEST['requesteradd2'];
			$rcity   = $_REQUEST['requestercity'];
			$rstate  = $_REQUEST['requesterstate'];
			$rzip    = $_REQUEST['requesterzip'];
			$remail  = $_REQUEST['requesteremail'];
			$rmobile = $_REQUEST['requestermobile'];
			$rdate   = $_REQUEST['requesterdate'];
			$sql = "INSERT INTO submitrequest_tb(request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,requester_date) 
			VALUES('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate');
			
			INSERT INTO submitrequest2_tb(request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,requester_date,current_email) 
			VALUES('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate','$rEmail');
			";
			if($conn->multi_query($sql) == TRUE)
			{
				$genid = mysqli_insert_id($conn);
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Request Submitted Successfully.</div>';
				$_SESSION['myid'] = $genid;
				echo "<script>location.href='submitrequestsuccess.php';</script>";
			}
			else
			{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Submit Your Request.</div>';
			}


			


		}
    }
?>
		<!--Start Container-->
		<div class="container-fluid">
			<div class="row"><!--Start Row-->
				<?php include('includes/sidebar.php'); ?>
				<!--Start Service Request 2nd Column-->
				<div class="col-sm-9 col-md-10  px-2 py-5 maincontentheight">
					<form class="mx-5" action="" method="POST">
						<div class="form-group">
							<label for="inputRequestInfo">Request Info</label>
							<input type="text" class="form-control" id="inputRequestInfo" name="requestinfo" placeholder="Request Info">
						</div>
						
						<div class="form-group">
							<label for="inputRequestDescription">Description</label>
							<input type="text" class="form-control" id="inputRequestDescription" name="requestdesc" placeholder="Write Description">
						</div>
						
						<div class="form-group">
							<label for="inputName">Name</label>
							<input type="text" class="form-control" id="inputName" name="requestername" placeholder="Rahul">
						</div>
						
						<div class="form-row d-md-flex">
							<div class="form-group col-md-6">
								<label for="inputAddress">Address Line 1</label>
								<input type="text" class="form-control" id="inputAddress" name="requesteradd1" placeholder="House No. 123">
							</div>
							<div class="form-group col-md-6">
								<label for="inputAddress2">Address Line 2</label>
								<input type="text" class="form-control" id="inputAddress2" name="requesteradd2" placeholder="Railway Colony">
							</div>
						</div>
						
						<div class="form-row d-md-flex">
							<div class="form-group col-md-6">
								<label for="inputCity">City</label>
								<input type="text" class="form-control" id="inputCity" name="requestercity" placeholder="Enter Your City Name">
							</div>
							<div class="form-group col-md-4">
								<label for="inputState">State</label>
								<input type="text" class="form-control" id="inputState" name="requesterstate" placeholder="Enter Your State">
							</div>
							<div class="form-group col-md-2">
								<label for="inputZip">Zip</label>
								<input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)" placeholder="Enter zip">
							</div>
						</div>
						
						<div class="form-row d-md-flex">
							<div class="form-group col-md-6">
								<label for="inputEmail">Email</label>
								<input type="email" class="form-control" id="inputEmail" name="requesteremail" placeholder="Enter Your Email">
							</div>
							<div class="form-group col-md-2">
								<label for="inputMobile">Mobile</label>
								<input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)"" placeholder="Enter Phone No.">
							</div>
							<div class="form-group col-md-2">
								<label for="inputDate">Date</label>
								<input type="date" class="form-control" id="inputDate" name="requesterdate" placeholder="Enter Date">
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-4" name="submitrequest">Submit</button>
						<button type="reset" class="btn btn-secondary mt-4">Reset</button>
						
					</form>
					<?php if(isset($msg)){ echo $msg;} ?>
				</div>
				<!--End Service Request 2nd Column-->

			</div><!--End Row-->
		</div><!--End Container-->
		<!--End Side Bar -->

		<!--Only Number for Input Fields-->
		<script>
			function isInputNumber(evt){
				var ch = String.fromCharCode(evt.which);
				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
		</script>


<?php
	include('includes/footer.php');
?>