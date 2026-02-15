<?php 
	define('PAGE','work'); 
	define('TITLE','Work Order');
    include('../dbConnection.php');
	include('includes/header.php');
	
?>
<!--Start 2nd Column-->
<div class="col-sm-9 col-md-10 py-5 px-2 maincontentheight ">
<?php
	$sql = "SELECT * FROM assignwork_tb";
	$result = $conn->query($sql);
	if($result->num_rows >0)
	{
		echo'<table class="table">';	
		 echo'<thead>';
		  echo'<tr>';
		   echo'<th scope="col">Req ID</th>';
		   echo'<th scope="col">Req Info</th>';
		   echo'<th scope="col">Name</th>';
		   echo'<th scope="col">Address</th>';
		   echo'<th scope="col">City</th>';
		   echo'<th scope="col">Mobile</th>';
		   echo'<th scope="col">Technician</th>';
		   echo'<th scope="col">Assigned Date</th>';
		   echo'<th scope="col">Action</th>';
		  echo'</tr>';
		 echo'<thead>';
		 echo'<tbody>';
			while($row = $result->fetch_assoc()){
				echo'<tr>';
					echo'<td>'.$row['request_id'].'</td>';
					echo'<td>'.$row['request_info'].'</td>';
					echo'<td>'.$row['requester_name'].'</td>';
					echo'<td>'.$row['requester_add2'].'</td>';
					echo'<td>'.$row['requester_city'].'</td>';
					echo'<td>'.$row['requester_mobile'].'</td>';
					echo'<td>'.$row['assign_tech'].'</td>';
					echo'<td>'.$row['assign_date'].'</td>';
					echo'<td>';
						echo'<form action="viewassignwork2.php" class="d-inline" method="POST">';
							echo'<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" type="submit" name="view" value="view"><i class="far fa-eye"></i></button>';
						echo'</form>';
						
						echo'<form action="" method="POST" class="d-inline">';
							echo'<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" type="submit" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
						echo'</form>';

						
					echo'</td>';
					
				echo'<tr>';
			}
		 echo'</tbody>';
		echo'</table>';
		   
		   
	}
	else{
		echo'0 results';
	}
	if(isset($_REQUEST['delete']))
	{
		$sql = "DELETE FROM assignwork_tb WHERE request_id ={$_REQUEST['id']}";
		if($conn->query($sql) == TRUE)
		{
			echo'<meta http-equiv="refresh" content="0;URL=?deleted"/>';
		}
		else
		{
			$dmsg = '<div class="alert alert-danger col-sm-6 m-3" role="alert">Unable to Delete Date</div>';
		}
	
	}
?>
	
</div>
<!--Emd 2md column--?>

<?php  
	if(isset($dmsg)){echo $dmsg;}
?>
	
<?php
	include('includes/footer.php');
?>
