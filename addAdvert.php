<?php 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

?>

<?php
	require_once "users.php";
		$errors = array(); 

	if (isset($_POST['add_advert'])) {
		require 'connect.php';

		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$content = mysqli_real_escape_string($conn, $_POST['content']);

		if (empty($title)) {
			array_push($errors, "Title is required");
		}
		if (empty($content)) {
			array_push($errors, "Content is required");
		}
		
		if (count($errors) == 0) {
			$date = date("Y.m.d");
			if (isset($_SESSION['UserName'])) {
				$username = $_SESSION['UserName']; 
				$user = new User();
				$results = $user->addAdvert($title,$content,$date,$username);
			}
			if ($results) {
				header('location: member.php');
			}
			else{
				array_push($errors, "Wrong inputs");
			}	
		}
		else{
			//header('location: http://localhost/dashboard/OOP/projectProposal.php');
		}
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

		<link rel="stylesheet" type="text/css" href="assets/css/proposal.css">

	</head>

	<body class="home">


		<!-- Header -->
		<?php 
			require_once 'layouts/header.php';
		 ?>


		 <section class="hero hero-overlap" style="background-image: url('assets/images/home-bg.jpg');">
		 	<div class="container-contact100">
			

				<div class="wrap-contact100" style="margin-top: 80px;">
					<div class="contact100-form-title" style="background-image: url(assets/images/bg_proposal.jpg);">
						<span class="contact100-form-title-1">
							<b>أضف إعلان جديد</b> 
						</span>
					</div>

					<form method="post"  action="addAdvert.php" class="contact100-form validate-form">
						<div class="wrap-input100 validate-input" data-validate="Name is required">
							<span class="label-input100" style="position: initial; float: right;">:العنوان</span>
							<input class="input100" style="text-align: right;" type="text" name="title" placeholder=" ...أدخل عنوان إعلان جديد">
							<span class="focus-input100"></span>
						</div>


						<div class="wrap-input100 validate-input" data-validate = "Message is required">
							<span class="label-input100" style="position: initial; float: right;">: المحتوى</span>
							<textarea class="input100" style="text-align: right;" name="content" placeholder=" ...أدخل محتوى الإعلان" rows="20"></textarea>
							<span class="focus-input100"></span>
						</div>

						<div class="container-contact100-form-btn">
							<button name="add_advert" class="contact100-form-btn">
								<span>
									<i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
									نشر
								</span>
							</button>
						</div>
					</form>
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/custom.js"></script>

	</body>
</html>


