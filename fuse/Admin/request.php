<?php 
	define('PAGE','request'); 
	define('TITLE','Requests');
	include('includes/header.php');
    include('../dbConnection.php');
	
?>
<!--Start 2nd Column-->
<div class="col-sm-4 mb-5 maincontentheight py-5 px-2">
	<?php
		$sql = "SELECT request_id, request_info,request_desc, requester_date FROM submitrequest_tb";
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
								echo'<input type="submit" name="close" class="btn btn-secondary" id="clsbtn" value="Close">';
							echo'</form>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
				
			}
		}
	?>
</div><!--End 2nd column-->



<?php
	include('assignworkform.php');
	include('includes/footer.php');
?>