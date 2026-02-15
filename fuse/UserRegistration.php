<?php
session_start();
require "dbConnection.php";
require "mailer.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['r_name'];
    $email = $_POST['r_email'];
    $password = password_hash($_POST['r_password'], PASSWORD_DEFAULT);
    $phone = $_POST['r_phone'];

    // Save to session temporarily
    $_SESSION['reg'] = [
        "r_name" => $name,
        "r_email" => $email,
        "r_password" => $password,
        "r_phone" => $phone,
    ];

    // Generate OTP
    $otp = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    // Check if email exists
    $check = $conn->query("SELECT * FROM requesterlogin_tb WHERE r_email='$email'");

    if ($check->num_rows == 0) {
        // New user → insert only email + OTP
        $conn->query("
            INSERT INTO requesterlogin_tb (r_email, r_otp, r_otp_expiry, r_verified)
            VALUES ('$email', '$otp', '$expiry', 0)
        ");
    } else {
        // Existing but unverified user → update OTP
        $conn->query("
            UPDATE requesterlogin_tb 
            SET r_otp='$otp', r_otp_expiry='$expiry'
            WHERE r_email='$email'
        ");
    }

    sendOTP($email, $otp);

    header("Location: VerifyUserRegistration.php");
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Font Awesome CSS-->
	<link rel="stylesheet" href="css/all.min.css">
	<!---->
	<title>Login</title>
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

		<!--Start Registraion Form-->
		<div class="container pt-1">
			<h2 class="text-center">Create an Account</h2>
			<div class="row mt-4 mb-4">
				<div class="col-md-6 offset-md-3">
					<form action="" method="POST" class="border shadow-lg p-3">
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="" class="font-weight-bold mt-3">Name</label>
							<input type="text" class="form-control" placeholder="Name" name="r_name">
						</div>
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="" class="font-weight-bold mt-3">Phone Number</label>
							<input type="text" class="form-control" placeholder="Phone Numbee" onkeypress="isInputNumber(event)" name="r_phone">
						</div>
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="" class="font-weight-bold mt-3">Email</label>
							<input type="email" class="form-control" placeholder="Email" name="r_email">
							<small class="form-text">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="" class="font-weight-bold mt-3">New Password</label>
							<input type="password" class="form-control" placeholder="Password" name="r_password">
						</div>
						<button type="submit" class="btn btn-primary mt-5 btn-block shadow-sm font-weight-bold w-100" name="rSignup"> signup</button>
						<em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.</em>
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
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/all.min.js"></script>
		
	
	
</body>
</html>
		