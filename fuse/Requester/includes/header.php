<?php
	include('../dbConnection.php');
	session_start();
	if(isset($_SESSION['is_login']))
	{
		$rEmail = $_SESSION['rEmail'];
	}
	else
	{
		echo "<script>location.href='../index.php';</script>";
	}
	
	$rEmail = $_SESSION['rEmail'];
	$sql="SELECT r_theme FROM requesterlogin_tb WHERE r_email='$rEmail'";
	$result = $conn->query($sql);
	if($result->num_rows ==1)
	{
		$row = $result->fetch_assoc();
		$rtheme = $row['r_theme'];
	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo TITLE ?></title>
	<!--bootstrap css-->
	<link rel="stylesheet" href="../css/bootstrap.css">
	
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
			height:100vh;
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
		
	</style>
	</head>
	<body class="<?php echo $rtheme; ?>">
		<!-- Top Navbar -->
		<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-2 mr-0" href="Requesterprofile.php">FUSE</a>
		</nav>
		

