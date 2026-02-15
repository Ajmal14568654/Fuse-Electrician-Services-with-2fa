<?php 
	define('PAGE','Update Tecnnicians'); 
	define('TITLE','Technician');
    include('../dbConnection.php');
	include('includes/header.php');
	
	if(isset($_REQUEST['empupdate'])){
		if(($_REQUEST['empName']=="") || ($_REQUEST['empCity']=="") ||($_REQUEST['empMobile']=="") || ($_REQUEST['empEmail']=="")){
			$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Filled.</div>';
			
		}
		else
		{
			$empName = $_REQUEST['empName'];
			$empCity = $_REQUEST['empCity'];
			$empMobile = $_REQUEST['empMobile'];
			$empEmail = $_REQUEST['empEmail'];
			$sql="INSERT INTO technician_tb (empName,empCity,empMobile,empEmail) VALUES('$empName','$empCity','$empMobile','$empEmail')";
			if($conn->query($sql)==TRUE)
			{
				$msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">technician inserted successfully.</div>';
			
			}
			else
			{
				$msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to insert technician.</div>';
			
			}
		}
	}

?>
<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 px-5 py-5 maincontentheight">

<h3 class="text-center">Add New Tecnnician</h3>
<form action="" method="POST">
		<div class="form-group">
			<label for="empName">Name</label>
			<input type="text" class="form-control" name="empName" id="empName" >
		</div>
		<div class="form-group">
			<label for="empCity">City</label>
			<input type="text" class="form-control" name="empCity" id="empCity" >
		</div>
		<div class="form-group">
			<label for="empMobile">Mobile</label>
			<input type="text" class="form-control" name="empMobile" id="empMobile" onkeypress="isInputNumber(event)" >
		</div>
		<div class="form-group">
			<label for="empEmail">Email</label>
			<input type="email" class="form-control" name="empEmail" id="empEmail" >
		</div>
		<div class="text-center">	
			<button type="submit" class="btn btn-primary mt-3" id="empupdate" name="empupdate" >Submit</button>
			<a href="technician.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->

<?php
	include('includes/footer.php');
?>