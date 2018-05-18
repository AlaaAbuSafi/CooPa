<?php 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

	if (isset($_GET['id'])) {
		require_once "users.php";
								
		require 'connect.php';

		$user2 = new User();
		$results = $user2->allmessages();
		foreach ($results as $result){
			if ($result['id'] == $_GET['id']) {
				$name = $result['name'];
				$phone = $result['phone'];
				$date = $result['date'];
				$message = $result['message'];
			}	
		}
	} 


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>View News</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
		
	</head>

	<body class="single single-post">

		<!-- Header -->
		<?php 
		require_once 'layouts/header.php';
		 ?>

		<!-- Hero Section -->
		<section class="hero small-hero" style="background-image:url(assets/images/home-bg.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap" style="float: right; position: initial; margin-top: 300px;">
						<h1 class="intro-title"><?php echo $name; ?></h1>
					</div>
				</div>
			</div>
		</section>

		<!-- Main Section -->
		<section class="main container">
			<div id="content" class="row">
				<div class="col-sm-8 col-md-6 col-md-push-3">
					<h3 style="text-align: right;"><?php echo $message; ?></h3>		
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-6 blog-details-column" style="float: right; position: initial;">
					<div class="entry-meta">
						<div style="float: right;">
							<span class="icon-meta">
								<span class="posted-on"> <span class="meta-item"><?php echo $date;?></span>
								</span>
							</span>
							&nbsp
							<i class="fa fa-calendar"></i>
						</div>
						<br>

						<div style="float: right;">
							<span class="icon-meta">
								<span class="posted-on"> <span class="meta-item">
									
									<?php echo $phone;
									?>
								</a>
									</span>
								</span>
							</span>
							<i class="glyphicon glyphicon-earphone"></i>
						</div>
						<br>
						
					</div>

					
				</div>
			</div>
		</section>

		<!-- Contact Us -->
		<?php 
		require_once 'layouts/contact.php';
		 ?>

        <!-- Footer -->
		<?php 
		require_once 'layouts/footer.php';
		 ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>