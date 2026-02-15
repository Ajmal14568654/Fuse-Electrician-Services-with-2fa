<?php 
	define('PAGE','dashboard'); 
	define('TITLE','Dashboard');
	include('includes/header.php');
    include('../dbConnection.php');

?>
			<div class="col-sm-9 col-md-10 maincontentheight px-2  py-5"><!-- Start Dashboard 2nd Column-->
				<div class="row mx-5 text-center">
					<div class="col-sm-4">
						<div class="card text-white bg-danger mb-3" style="max-width:15rem;">
							<div class="card-header">Requests Received</div>
							<div class="card-body">
								<h4 class="card-title">45</h4>
								<a class="btn text-white" href="#">view</a>
							</div>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="card text-white bg-success mb-3" style="max-width:15rem;">
							<div class="card-header">Assigned Work</div>
							<div class="card-body">
								<h4 class="card-title">52</h4>
								<a class="btn text-white" href="#">view</a>
							</div>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="card text-white bg-info mb-3" style="max-width:15rem;">
							<div class="card-header">Technician</div>
							<div class="card-body">
								<h4 class="card-title">1</h4>
								<a class="btn text-white" href="#">view</a>
							</div>
						</div>
					</div>
				</div>
				<div class="mx-5 mt-5 text-center">
					<a class="bg-dark text-light p-2 d-block text-decoration-none">List of Requesters</a>
					<?php
						$sql = "SELECT * FROM requesterlogin_tb";
						$result = $conn->query($sql);
						if($result ->num_rows >0)
						{
							echo'<table class="table">
									<thead>
										<tr>
											<th scope="col">Requester ID</th>
											<th scope="col">Name</th>
											<th scope="col">Email</th>
											
										</tr>
									</thead>
									<tbody>';
									  while($row = $result->fetch_assoc())
									  {
									    echo '<tr>';
											echo '<td>'.$row["r_login_id"].'</td>';
											echo '<td>'.$row["r_name"].'</td>';
											echo '<td>'.$row["r_email"].'</td>';
									    echo '<tr>';
									  }
									echo '</tbody>
									
							     </table>
							';
						}
						else
						{
							echo "0 result";
						}
					?>
				</div>
			</div><!-- End Dashboard 2nd Column-->
<?php
	include('includes/footer.php');
?>