				<nav class="col-sm-2 navsidebg  sidebar py-5 d-print-none" ><!--Start Side Bar 1st column-->
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item border-rounded">
								<a class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active';} ?>" href="Requesterprofile.php"><i class="fas fa-user"></i>Profile</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>" href="Submitrequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="Checkstatus.php"><i class="fas fa-align-center"></i>Check Status</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link <?php if(PAGE == 'ChangePassword'){echo 'active';} ?>" href="Changepassword.php"><i class="fas fa-key"></i>Change Password</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link <?php if(PAGE == 'ChangeTheme'){echo 'active';} ?>" href="Changetheme.php"><i class="fas fa-palette"></i>Change Theme</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link <?php if(PAGE == 'UserRequest'){echo 'active';} ?>" href="Yourrequests.php"><i class="fas fa-palette"></i>Your Requests</a>
							</li>
							<li class="nav-item border-rounded mt-2">
								<a class="nav-link" href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
							</li>
						</ul>
					</div>
				</nav><!-- End Side Bar 1st Column-->