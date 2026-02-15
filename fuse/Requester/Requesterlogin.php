<?php
session_start();
require "../dbConnection.php";
require "../mailer.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_id = $_POST["login_id"]; // email OR name
    $password = $_POST["r_password"];

    $res = $conn->query("
        SELECT * FROM requesterlogin_tb 
        WHERE (r_email='$login_id' OR r_name='$login_id')
        AND r_verified=1
    ");

    if ($res->num_rows == 0) {
        die("User does not exist or is not verified");
    }

    $user = $res->fetch_assoc();

    if (!password_verify($password, $user['r_password'])) {
        die("Incorrect password");
    }

    // Generate login OTP
    $otp = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    $conn->query("
        UPDATE requesterlogin_tb 
        SET r_otp='$otp', r_otp_expiry='$expiry'
        WHERE r_login_id='{$user['r_login_id']}'
    ");

    sendOTP($user['r_email'], $otp);

    $_SESSION['login_id'] = $user['r_login_id'];

    header("Location: Verifyrequesterlogin.php");
    exit;
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
	<title>Login</title>
	<style>
		.custom-margin{
			margin-top:8vh;
		}
	</style>
</head>
<body>
	<div class="mb-3 mt-5 text-center" style="font-size:30px;">
		<i class="fas fa-stethoscope"></i>
		<span>Online Electrical Service Management System.</span>
	</div>
	<p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-primary"></i>Requester Area (Demo)</p>
	<div class="container-fluid">
		<div class="row justify-content-center custom-margin">
			<div class="col-sm-9 col-md-6 col-lg-4 ">
				<form action="" method="POST" class="shadow-lg p-4">
					<div class="form-group">
						<i class="fas fa-user"></i>
						<label for="email" class="font-weight-bold pl-2">Email or Username</label>
						<input type="text" class="form-control mt-2" required placeholder="Email" name="login_id">
						<small class="form-text">We'll never share your email with anyone else</small>
					</div>
					<div class="form-group mt-4">
						<i class="fas fa-key"></i>
						<label for="password" class="font-weight-bold pl-2">Password</label>
						<input type="password" class="form-control mt-2" required placeholder="password" name="r_password">
					</div>
					<button type="submit" class="mt-5 btn btn-outline-primary font-weight-bold w-100 shadow-sm ">Login</button>
					<?php if(isset($msg)){ echo $msg;} ?>
				</form>
				<div class="text-center">
					<a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm"><lable class="text-light">Back To Home</label></a>
				</div>
			</div>
		</div>
	</div>
		
		
	<!-- Javascript Files -->
	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/all.min.js"></script>
		
	
	
</body>
</html>