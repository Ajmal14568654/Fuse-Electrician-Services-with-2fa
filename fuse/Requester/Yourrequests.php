<?php 
	define('PAGE','UserRequest'); 
	define('TITLE','UserRequest');
	include('includes/header.php');
    include('../dbConnection.php');	

	if (isset($_POST['view'])) {
    $viewID = $_POST['id'];
    header("Location: Viewuserrequests.php?id=$viewID");
    exit;
    }

	if(isset($_REQUEST['cancel']))
	{
		$sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']};
		        DELETE FROM submitrequest2_tb WHERE request_id = {$_REQUEST['id']};";
		if($conn->multi_query($sql)== TRUE)
		{
			echo'<meta http-equiv="refresh" content="0;URL=?closed" />';
		}
		else
		{
			echo'Unable to Delete';
		}
	}
?>
<!--Start Container-->
<div class="container-fluid">
<div class="row"><!--Start Row-->
<?php include('includes/sidebar.php');  ?>
<!--Start 2nd Column-->
<div class="col-sm-8 mb-5 maincontentheight py-5 px-2">
	<?php
		$sql = "SELECT request_id, request_info,request_desc, requester_date FROM submitrequest2_tb WHERE current_email = '$rEmail' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row =$result->fetch_assoc())
			{
				echo'<div class="card mt-5 mx-5">';
					echo '<div class="card-header">';
						echo'Request ID:'.$row['request_id'];
					echo'</div>';
					echo'<div class="card-body">';
						echo'<h5 class="card-title">Request Info: '.$row['request_info'];
						echo'</h5>';
						echo'<p class="card-text">'.$row['request_desc'];
						echo'</p>';
						echo'<p class="card-text">Request Date: '.$row['requester_date'];
						echo'</p>';
						echo'<div class="" style="float:right;">';
						    echo'<form action="" method="POST">';
								echo'<input type="hidden" name="id" value='.$row["request_id"].'>';
								echo'<input type="submit" name="view" class="btn btn-primary" id="viewbtn" value="View" style="margin-right:12px;">';
								echo'<input type="submit" name="cancel" class="btn btn-secondary" id="cnclbtn" value="Cancel Request">';
							echo'</form>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
				
			}
		}
	?>
</div><!--End 2nd column-->
</div><!--End Row-->
</div><!--End Container-->


<?php
	
	include('includes/footer.php');
?>