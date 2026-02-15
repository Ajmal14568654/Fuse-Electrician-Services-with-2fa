<?php
session_start();
require "../dbConnection.php";

if (!isset($_SESSION['login_id'])) {
    die("No login session.");
}

$login_id = $_SESSION['login_id'];

$res = $conn->query("SELECT * FROM requesterlogin_tb WHERE r_login_id='$login_id'");
$user = $res->fetch_assoc();

if (!$user) die("User not found.");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $otp = $_POST['otp'];

    if ($otp == $user['r_otp'] && strtotime($user['r_otp_expiry']) >= time()) {

        $_SESSION['is_login'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['rEmail'] = $user['r_email']; // FIXED

        header("Location: Requesterprofile.php");
        exit;
    }

    echo "Invalid or expired OTP!";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width ,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!--Font Awesome CSS-->
	<link rel="stylesheet" href="../css/all.min.css">
	<!---->
	<title>Verify Login</title>
	<style>
		.custom-margin{
			margin-top:8vh;
		}
	</style>
</head>
<body>
	<div class="mb-1 mt-1 text-center" style="font-size:30px;">
		<i class="fas fa-stethoscope"></i>
		<span>Online Electrical Service Management System.</span>
	</div>
	<p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-primary"></i>Requester Area (Demo)</p>

		<!--Start Verification Form-->
		<div class="container pt-1">
			<h2 class="text-center">Verify Your Account For Login</h2>
			<div class="row mt-4 mb-4">
				<div class="col-md-6 offset-md-3">
					<form action="" method="POST" class="border shadow-lg p-3">
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="" class="font-weight-bold mt-3">Enter OTP</label>
							<input type="text" class="form-control" name="otp" maxlength="6" placeholder="Enter Your OTP" required onkeypress="isInputNumber(event)">
						</div>
						
						<button type="submit" class="btn btn-primary mt-5 btn-block shadow-sm font-weight-bold w-100"> Verify OTP</button>
						<em style="font-size:10px;">OTP that sent to your gmail account valid for only upto 10 minutes.</em>
						<?php if(isset($regmsg)){ echo $regmsg;} ?>
					</form>
			</div>
		<div>
		<!--End Registraion Form-->

		<script>
			function isInputNumber(evt){
				var ch = String.fromCharCode(evt.which);
				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
		</script>
				
	<!-- Javascript Files -->
	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/all.min.js"></script>
		
	
	
</body>
</html>