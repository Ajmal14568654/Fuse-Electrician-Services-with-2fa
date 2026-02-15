<?php
	include('../dbConnection.php');
	session_start();
	if($_SESSION['is_adminlogin'])
	{
		$rEmail = $_SESSION['aEmail'];
	}
	else
	{
		echo"<script>location.href='Requesterlogin.php'</script>";
	}
	$aEmail = $_SESSION['aEmail'];
	$sql="SELECT a_theme FROM adminlogin_tb WHERE a_email='$aEmail'";
	$result = $conn->query($sql);
	if($result->num_rows ==1)
	{
		$row = $result->fetch_assoc();
		$atheme = $row['a_theme'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="widht=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<title><?php echo TITLE; ?></title>
	<!--bootstrap css-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!--fontawesome css-->
	<link rel="stylesheet" href="../css/all.min.css">
	<style>
		.light .nav-link{
			color:black;
		}
		.light .active{
			color:#2ea3f2;
			background-color:#e8f4fd;
			border-radius:8px;
			
		}
		.light .nav-link:hover{
			color:#2ea3f2;
			background-color:#e8f4fd;
			border-radius:8px;
			
		}
		.light nav{
			background-color:#2ea3f2;
		}
		.light .navsidebg{
			background-color:white;
		}
		.light .maincontentheight{
			height:100vh;
			background-color:#f4f6f8;
		}
		.light .border-rounded{
			border-radius:8px;
		}
		.light .container-fluid{
			margin-top:40px;
		}
		
		
		.dark .nav-link{
			color:#94a3b8;
		}
		.dark .active{
			color:#2ea3f2;
			background-color:#e8f4fd;
			border-radius:8px;
			
		}
		.dark .nav-link:hover{
			color:#2ea3f2;
			background-color:#e8f4fd;
			border-radius:8px;
			
		}
		.dark nav{
			background-color:#2ea3f2;
		}
		.dark .navsidebg{
			background-color:#1e293b;
		}
		.dark .maincontentheight{
			min-height:100vh;
			background-color:#0f172a;
		}
		.dark .border-rounded{
			border-radius:8px;
		}
		.dark .container-fluid{
			margin-top:40px;
			color:white;
		}
		.dark input{
			background-color:#020617;
			color:#fff;
		}
		.dark select{
			background-color:#020617;
			color:#fff;
		}
		#viewbtn{
			background-color:#0d6efd;
		}
		#clsbtn{
			background-color:#6c757d;
		}
		#searchbtnwpr{
			background-color:#6c757d;
		}
		
	
		
	</style>
</head>
<body class="<?php echo $atheme; ?>">
	<!-- Top Navbar -->
	<nav class=" d-print-none navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-2 mr-0" href="dashboard.php">FUSE</a>
	</nav>
	
	<!--Start Container-->
	<div class="container-fluid">
		<div class="row"><!--Start Row-->
			<nav class="col-sm-2 navsidebg sidebar  d-print-none"><!--Start Side Bar 1st column-->
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE == "dashboard"){echo 'active';} ?>" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE == "work"){echo 'active';} ?>" href="work.php"><i class="fas fa-wrench"></i>Work Order</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="request"){echo 'active';} ?>" href="request.php"><i class="fas fa-list-alt"></i>Requests</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="assets"){echo 'active';} ?>" href="assets.php"><i class="fas fa-database"></i>Assets</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="technician"){echo 'active';} ?>" href="technician.php"><i class="fas fa-headset"></i>Technician</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="requesters"){echo 'active';} ?>" href="requester.php"><i class="fas fa-users"></i>Requester</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="sellreport"){echo 'active';} ?>" href="soldproductreport.php"><i class="fas fa-chart-line"></i>Sell Report</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="workreport"){echo 'active';} ?>" href="workreport.php"><i class="fas fa-table"></i>Work Report</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="changepass"){echo 'active';} ?>" href="changepass.php"><i class="fas fa-key"></i>Change Password</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link <?php if(PAGE =="changetheme"){echo 'active';} ?>" href="Changetheme.php"><i class="fas fa-palette"></i>Change Theme</a>
						</li>
						<li class="nav-item border-rounded mt-2">
							<a class="nav-link" href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
						</li>
					</ul>
				</div>
			</nav><!-- End Side Bar 1st Column-->
