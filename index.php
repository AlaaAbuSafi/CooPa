<?php 
	session_start();

	if (isset($_SESSION['UserName'])) {
		header('location: member.php');
	}

	if (isset($_GET['logout']) == 1) {
		session_destroy();
		unset($_SESSION['UserName']);
		//header("location: index.php");
	} 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CooPa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="assets/css/owl-carousel.css" media="screen">
		<link rel="stylesheet" href="assets/css/design.css" media="screen">

	</head>

	<body class="home">


		<div id="top"></div>

		<!-- Header -->
		<?php 
		require_once 'layouts/gestHeader.php';
		 ?>

		<!-- Hero Section -->
		<section class="hero hero-overlap" style="background-image: url('assets/images/home-bg.jpg');">
			<div class="bg-overlay">
				<div class="container">
					<div class="intro-wrap">
						<h1 class="intro-title"></h1>
						
					</div>
				</div>
			</div>
		</section>



		<!-- Contact Us -->
		<?php 
		require_once 'layouts/gestContact.php';
		 ?>

		 <!-- Contact Us -->
		<?php 
		require_once 'layouts/contact.php';
		 ?>

        <!-- Footer -->
		<?php 
		require_once 'layouts/footer.php';
		 ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>