<?php
	define('TITLE','Success');
	define('PAGE','RequesterProfile');
	include('includes/header.php');
	include('../dbConnection.php');
	$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		$printreceipt = "<div class='col-sm-9 col-md-10 ml-5 mt-5 maincontentheight'>
			   <table class='table'>
			    <tbody>
				 <tr>
				  <th>Request Id</th>
				  <td>".$row['request_id']."</td>
				 </tr>
				 <tr>
				  <th>Name</th>
				  <td>".$row['requester_name']."</td>
				 </tr>
				 <tr>
				  <th>Email Id</th>
				  <td>".$row['requester_email']."</td>
				 </tr>
				 <tr>
				  <th>Request Info</th>
				  <td>".$row['request_info']."</td>
				 </tr>
				 <tr>
				  <th>Request Description</th>
				  <td>".$row['request_desc']."</td>
				 </tr>
				 
				 <tr>
				  <td>
				   <form class='d-print-none'>
				    <input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'>
				   </form>
				  </td>
				 </tr>
				</tbody>
			   </table>
			  </div>";
	}
	else
	{
		echo"Failed";
	}
?>
<?php
	
		echo '<div class="container-fluid" style="margin-top:40px;">';   
		echo '<div class="row">';
			include('includes/sidebar.php'); 
			if(isset($printreceipt)){
   				 echo $printreceipt;
			}
		echo '</div>';
		echo '</div>';	
		include('includes/footer.php');
		
?>
		