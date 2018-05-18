<?php
	if (isset($_POST['search'])) {
		$value = $_POST['value'];
		header("location: https://www.google.ps/search?q=$value");
	}   
?>
<!-- Navigation (main menu) -->

		<div class="navbar-wrapper">
			<header class="navbar navbar-default navbar-fixed-top" id="MainMenu">
				<div class="navbar-extra-top clearfix">
					<div class="navbar container-fluid">
						<ul class="nav navbar-nav navbar-left">

							<li class="menu-item"><a href="index.php?logout='1'"><i class="fa fa-sign-out"></i> تسجيل الخروج  </a></li>

							<li class="menu-item">
									<?php
										require_once "users.php";
											
										require 'connect.php';
										if (isset($_SESSION['UserName'])){
											$userId  = $_SESSION['UserName'];
											echo '<a href="Profile/profile.php?id='.$userId.'">';
										}

										$user1 = new User();
										$userInfo = $user1->userInfo($userId);
										$userPicture = $userInfo['picture'];
										$userType = $userInfo['type'];

										echo '<img src="Profile/images/'.$userPicture.'"'.'class="img-circle" width="30" height="30">';	
										echo "&nbsp";
										echo "&nbsp";
										echo $userInfo['fName'] . "&nbsp" . $userInfo['lName'];	
									?>
								</a></li>

							

						</ul>
						<div class="navbar-top-right">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus fa-fw"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram fa-fw"></i></a></li>
							</ul>
							<form method="post" class="navbar-form navbar-right navbar-search" role="search" action="">
								<div class="form-group">
									<input type="text" name="value" class="form-control" placeholder="Search">
								</div>
								<button type="submit" name="search" class="btn btn-default"><span class="fa fa-search"></span></button>
							</form>
						</div>
					</div>
				</div>

				<div class="container-fluid collapse-md" id="navbar-main-container">
					<div class="navbar-header">
						<a href="member.php" class="navbar-brand"><img src="assets/images/logo.PNG"><span class="sr-only">&nbsp; CooPa</span></a>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<nav class="navbar-collapse collapse" id="navbar-main">
						<ul class="nav navbar-nav navbar-right">
							
							<?php if ($userType == 3 || $userType == 1) : ?>
							<li class="dropdown show-on-hover">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">التواصل</a>
								<ul class="dropdown-menu">
									<li><a href="messages.php">الرسائل</a></li>
									<li><a href="interests.php">المهتمين</a></li>
								</ul>
							</li>
							<?php  endif ?>
							
							<?php
								if ($userType == 3 || $userType == 1) {
								  	echo '<li><a href="addAdvert.php">إضافة إعلان</a></li>';
								  }  
							?>

							<li><a href="AboutCoopa.php">عن الجمعية</a></li>
							
						</ul>
					</nav>
				</div><!-- /.container-fluid -->
			</header>
		</div><!-- End navbar-wrapper -->

