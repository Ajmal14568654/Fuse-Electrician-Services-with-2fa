<?php 
	define('PAGE','requesters'); 
	define('TITLE','Requesters');
    include('../dbConnection.php');
	include('includes/header.php');
	
?>

<!--Start 2nd column-->
<div class="col-sm-9 col-md-10 px-5 py-5 maincontentheight" style="background-color:#F2F6F8;">
	<h3 class="text-center">Update Requester Details</h3>
	<?php  
		if(isset($_REQUEST['id']))
		{
			$sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id ={$_REQUEST['id']}";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
		}
		if(isset($_REQUEST['requpdate']))
			{
				if(($_REQUEST['r_login_id'] =="") ||  ($_REQUEST['r_name']=="") || ($_REQUEST['r_email']==""))
				{
					$msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Filled.</div>';
				}
				else
				{
					$rid = $_REQUEST['r_login_id'];
					$rname = $_REQUEST['r_name'];
					$remail = $_REQUEST['r_email'];
					$sql = "UPDATE requesterlogin_tb SET r_login_id ='$rid', r_name = '$rname', r_email ='$remail' WHERE r_login_id = '$rid' ";
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
	<form action="editreq.php" method="POST">
	    <div class="form-group">
			<label for="r_login_id">Requester ID</label>
			<input type="text" class="form-control" name="r_login_id" id="r_login_id" readonly value="<?php if(isset($row['r_login_id'])){echo $row['r_login_id'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_name">Name</label>
			<input type="text" class="form-control" name="r_name" id="r_name" value="<?php if(isset($row['r_name'])){echo $row['r_name'];} ?>">
		</div>
		<div class="form-group">
			<label for="r_email">Email</label>
			<input type="text" class="form-control" name="r_email" id="r_email" value="<?php if(isset($row['r_email'])){echo $row['r_email'];} ?>">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-primary mt-3" id="requpdate" name="requpdate" >Update</button>
			<a href="requester.php" class="btn btn-secondary mt-3">Close</a>
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
	</form>
</div>
<!--End 2nd column-->




<?php include('includes/footer.php');