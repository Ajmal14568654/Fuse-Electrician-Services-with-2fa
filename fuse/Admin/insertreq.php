<?php 
	define('PAGE','requesters'); 
	define('TITLE','Requesters');
    include('../dbConnection.php');
	include('includes/header.php');
	
	if(isset($_REQUEST['reqsubmit'])){
		if(($_REQUEST['r_name']=="") || ($_REQUEST['r_email']=="") ||($_REQUEST['r_password']=="")){
			$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Filled.</div>';
			
		}
		else
		{
			$rname = $_REQUEST['r_name'];
			$rEmail = $_REQUEST['r_email'];
			$rPassword = $_REQUEST['r_password'];
			$sql="INSERT INTO requesterlogin_tb (r_name,r_email,r_password) VALUES('$rname','$rEmail','$rPassword')";
			if($conn->query($sql)==TRUE)
			{
				$msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">requester inserted successfully.</div>';
			
			}
			else
			{
				$msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to insert requester.</div>';
			
			}
		}
	}

?>
<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 px-5 py-5 maincontentheight">

<h3 class="text-center">Add New Requester</h3>
<form action="" method="POST">
		<div class="form-group">
			<label for="r_name">Name</label>
			<input type="text" class="form-control" name="r_name" id="r_name" >
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="email" class="form-control" name="r_email" id="r_email" >
		</div>
		<div class="form-group">
			<label for="r_password">Password</label>
			<input type="password" class="form-control" name="r_password" id="r_password" >
		</div>
		<div class="text-center">	
			<button type="submit" class="btn btn-primary mt-3" id="reqsubmit" name="reqsubmit" >Submit</button>
			<a href="requester.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->

<?php
	include('includes/footer.php');
?>