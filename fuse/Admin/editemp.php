<?php 
	define('PAGE','Update Technician'); 
	define('TITLE','Technician');
    include('../dbConnection.php');
	include('includes/header.php');
?>

<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 px-2 py-5 maincontentheight" style="background-color:#F2F6F8;">
	<h3 class="text-center">Update Technician Details</h3>
	<?php  
		if(isset($_REQUEST['id']))
		{
			$sql = "SELECT * FROM technician_tb WHERE empid ={$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
		}
		if(isset($_REQUEST['empupdate']))
			{
				if(($_REQUEST['empName'] =="") ||  ($_REQUEST['empCity']=="") || ($_REQUEST['empMobile']=="") || ($_REQUEST['empEmail']==""))
				{
					$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Filled.</div>';
				}
				else
				{
					$empid =$_REQUEST['empid'];
					$empName = $_REQUEST['empName'];
					$empCity = $_REQUEST['empCity'];
					$empMobile = $_REQUEST['empMobile'];
					$empEmail = $_REQUEST['empEmail'];
					$sql = "UPDATE technician_tb SET empName ='$empName', empCity = '$empCity', empMobile ='$empMobile', empEmail = '$empEmail' WHERE empid = '$empid' ";
					if($conn->query($sql)==TRUE)
					{
						$msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Data Updated Successfully.</div>';
					}
					else
					{
						$msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Insert Data.</div>';
					}
				}
			}
			
	?>
	<form action="editemp.php" method="POST">
		<div class="form-group">
			<label for="empid">ID</label>
			<input type="text" class="form-control" name="empid" id="empid" value="<?php if(isset($row['empid'])){echo $row['empid'];} ?>">
		</div>
	    <div class="form-group">
			<label for="empName">Name</label>
			<input type="text" class="form-control" name="empName" id="empName" value="<?php if(isset($row['empName'])){echo $row['empName'];} ?>">
		</div>
		<div class="form-group">
			<label for="empCity">City</label>
			<input type="text" class="form-control" name="empCity" id="empCity" value="<?php if(isset($row['empCity'])){echo $row['empCity'];} ?>">
		</div>
		<div class="form-group">
			<label for="empMobile">Mobile</label>
			<input type="text" class="form-control" name="empMobile" id="empMobile" value="<?php if(isset($row['empMobile'])){echo $row['empMobile'];} ?>">
		</div>
		<div class="form-group">
			<label for="empEmail">Email</label>
			<input type="email" class="form-control" name="empEmail" id="empEmail" value="<?php if(isset($row['empEmail'])){echo $row['empEmail'];} ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary mt-3" id="empupdate" name="empupdate" >Update</button>
			<a href="technician.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->
<?php include('includes/footer.php') ?>




<?php include('includes/footer.php');