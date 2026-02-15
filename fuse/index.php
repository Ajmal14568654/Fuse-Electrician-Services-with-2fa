<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OSMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mains.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php">FUSE</a>
        <span class="navbar-text d-none d-lg-block text-white">
            Customer's Happiness is our Aim
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav ms-auto custom-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#registration">Registration</a></li>
                <li class="nav-item"><a class="nav-link" href="Requester/Requesterlogin.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- HEADER -->
<header class="text-center"
        style="/*background-image:url(images/hmpgbn.jpg);*/">
    
    <section class="banner">
  <div class="content">

    <div class="title">
      <span class="fuse">FUSE</span>
      <span class="electrician">ELECTRICIAN</span>
      <span class="services">SERVICES</span>
    </div>

    <p class="tagline">“Current Solutions for Modern Challenges”</p>
    
    <div class="mainHeading">
        <a href="Requester/Requesterlogin.php" class="btn btn-success me-3">Login</a>
        <a href="UserRegistration.php" class="btn btn-danger">Sign Up</a>
    </div>
    <br><br>
    
    

   
  </div>
</section>

    <!--
    <div class="mainHeading">
        <a href="Requester/Requesterlogin.php" class="btn btn-success me-3">Login</a>
        <a href="#registration" class="btn btn-danger">Sign Up</a>
    </div>
    -->
</header>

<!-- INTRO -->
<div class="container mt-5 fsbg">
    <div class="p-4 rounded ">
        <h3 class="text-center">FUSE Services</h3>
        <p>
            FUSE Services is India's leading chain of multi-brand Electronics and Electrical service workshop
            offering wide array of services. we focus on enhancing your uses ex[perience by offering world-class Electronics applicanciances
            maintainence services. Out sole mission is "to provide electronic appliances care services to keep the devices fit and healthy
            and customer's happy and smiling". With well-equipped electronic appliances service centers and fully
            traied mechanics, we provide quality services with excellent packages that are designed to offer you great savings. our state-of
            -art workshops are conveniently located in many cities across the country. Now you can book your service online by doing registration.
        </p>
    </div>
</div>

<!-- SERVICES -->
<div id="services" class="container mt-5 border-bottom">
    <h2 class="text-center">Our Services</h2>
    <div class="row text-center mt-4">
        <div class="col-md-4 mb-4">
            <i class="fas fa-tv fa-5x text-success"></i>
            <h4 class="mt-3">Electrical Appliances</h4>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-sliders-h fa-5x text-primary"></i>
            <h4 class="mt-3">Preventive Maintenance</h4>
        </div>
        <div class="col-md-4 mb-4">
            <i class="fas fa-cogs fa-5x text-info"></i>
            <h4 class="mt-3">Fault Repair</h4>
        </div>
    </div>
</div>

<!--REGISTRATION --> 
<!-- <div id="registration" class="container mt-5">
     <?php //include('UserRegistration.php'); ?> 
</div>   -->

<!-- CONTACT -->
<div id="contact" class="container mt-5">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <?php include('contactform.php'); ?>

        <div class="col-md-4 text-center">
            <strong>Head Office</strong><br>
            FUSE Pvt Ltd, Ranchi<br>
            Phone: +0000000000
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6">
                Follow Us:
                <i class="fab fa-facebook ms-2 fi-color"></i>
                <i class="fab fa-twitter ms-2 fi-color"></i>
                <i class="fab fa-youtube ms-2 fi-color"></i>
            </div>
            <div class="col-md-6 text-end">
                <small>Designed by geekyshows © 2019</small>
                <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
                
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/all.min.js"></script>



</body>
</html>
