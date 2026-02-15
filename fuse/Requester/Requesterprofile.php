<?php
	define('TITLE','Requester Profile');
	define('PAGE','RequesterProfile');
	include('includes/header.php');
	include('../dbConnection.php');
	$sql="SELECT r_email,r_name FROM requesterlogin_tb WHERE r_email='$rEmail'";
	$result = $conn->query($sql);
	if($result->num_rows ==1)
	{
		$row = $result->fetch_assoc();
		$rName = $row['r_name'];
	
	}
	if(isset($_REQUEST['nameupdate']))
	{
		if($_REQUEST['rName'] =="") 
		{
			$passmsg = '<div class="alert alert-warning col-sm-6 mt-2 w-100" role="alert">Fill All Fields.</div>';
		}
		else
		{
			$rName = $_REQUEST['rName'];
			$sql = "UPDATE requesterlogin_tb SET r_name ='$rName' WHERE r_email = '$rEmail'";
			if($conn->query($sql)==TRUE )
			{
				$passmsg = '<div class="alert alert-success mt-2 col-sm-6 w-100" role="alert">Updated Successfully.</div>';
			}
			else
			{
				$passmsg = '<div class="alert alert-danger mt-2 col-sm-6 w-100" role="alert">Not Updated Successfully.</div>';
			}
		}
	}
?>
		<!--Start Container-->
		<div class="container-fluid">
			<div class="row"><!--Start Row-->
				<?php include('includes/sidebar.php'); ?>
				<div class="col-sm-9 col-md-10 px-2 py-5 maincontentheight "><!--Start Profile Area 2nd Column-->
					<form action="" method="POST" class="ms-5">
						<div class="form-group">
							<label for="rEmail">Email</label>
							<input type="email" class="form-control mt-2" name="rEmail" id="rEmail" value="<?php echo $rEmail; ?>">
						</div>
						<div class="form-group mt-3">
							<label for="rName">Name</label>
							<input type="text" class="form-control mt-2" name="rName" id="rName" value="<?php echo $rName; ?>">
						</div>
						<button type="submit"class="btn btn-primary mt-3" name="nameupdate">Update</button>
						<?php if(isset($passmsg)){echo $passmsg;} ?>
					</form>
				</div><!--End Profile Area 2nd Column-->
			</div><!--End Row-->
		</div><!--End Container-->
		<!--End Side Bar -->
<?php
include('includes/footer.php');

?>