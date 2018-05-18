

<!-- Navigation (main menu) -->

		<div class="navbar-wrapper">
			<header class="navbar navbar-default navbar-fixed-top" id="MainMenu">
				<div class="navbar-extra-top clearfix">
					<div class="navbar container-fluid">
						<ul class="nav navbar-nav navbar-left">
							<li class="menu-item">
								<a data-toggle="modal" data-target="#myModal">
								<i class="fa fa-envelope"></i>
									تابعنا</a>
							</li>

							<li class="menu-item">
								<a data-toggle="modal" data-target="#myModal2">
								<i class="fa fa-envelope"></i>
									تواصل معنا</a>
							</li>
							
							<li class="menu-item"><a href="login.php"><i class="fa fa-sign-in"></i> تسجيل الدخول </a></li>

							<li class="menu-item"><a href="signup.php"><i class="fa fa-sign-in"></i> تسجيل الاشتراك</a></li>

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
						<a href="index.php" class="navbar-brand"><img alt="Logo" src="assets/images/logo.png"><span class="sr-only">&nbsp; CooPa</span></a>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<nav class="navbar-collapse collapse" id="navbar-main">
						<ul class="nav navbar-nav navbar-right">	
							<li><a href="gestAboutCoopa.php">عن الجمعية</a></li>
						</ul>
					</nav>
				</div><!-- /.container-fluid -->
			</header>
		</div><!-- End navbar-wrapper -->
<?php
	if (isset($_POST['search'])) {
		$value = $_POST['value'];
		header("location: https://www.google.ps/search?q=$value");
	}   
?>