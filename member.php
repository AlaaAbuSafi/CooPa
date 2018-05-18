<?php 
header ('Content-Type: text/html; charset=UTF-8'); 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

	require_once "users.php";
								
	require 'connect.php';

	$generalId = $_SESSION['UserName'];
	$user = new User();
	$about = $user->userInfo($generalId);
	if ($about['type'] == 6){
		session_destroy();
		unset($_SESSION['UserName']);
		header('location: index.php');
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
		<link rel="icon" type="image/png" href="assets/images/favicon.ico"/>

	</head>

	<body class="home">


		<div id="top"></div>

		<!-- Header -->
		<?php 
		require_once 'layouts/header.php';
		 ?>

		<!-- Image -->
		<section class="hero hero-overlap" style="background-image: url('assets/images/home-bg.jpg');">
			<div class="bg-overlay">
				<div class="container">
					<div class="intro-wrap">
						<h1 class="intro-title"></h1>
						
					</div>
				</div>
			</div>
		</section>

		<!-- Image -->
		<section class="featured-destinations">
			<div class="container">
				<div class="cards overlap">

					<!-- Section Title -->
					<div class="title-row">
						
						<a href="CooPaNews.php" class="btn btn-primary btn-xs">عرض الكل &nbsp; <i class="fa fa-angle-right"></i></a>
						<h3 class="title-entry"> &nbsp;الإعلانات</h3>
					</div>

					<!-- Cards Row -->
					<div class="row">

						<?php
							require_once "users.php";
								
							require 'connect.php';

							$user = new User();
							$results = $user->allNews();
							$index = 0;
							foreach ($results as $result) : ?>
							
								<?php if ($index < 4) : ?>
									<?php $id_advert = $result['id'];?>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<article class="card">
								<?php
									echo '<a href="news.php?id='.$id_advert .'" rel="bookmark" class="featured-image" style="background-image: url(assets/images/advert.jpg)">';
								?>
									<div class="featured-img-inner"></div>
								</a>
								<div class="card-details" >
									<h4 class="card-title" style="text-align: right;"><?php echo $result['title'];?> </h4>
									<div class="meta-details clearfix">
										<span class="posted-on">
											<?php echo $result['date'] ?>
										</span>
									</div>
								</div>
							</article>
						</div>
					
						<?php $index++;  endif ?>
							<?php  endforeach ?>
					</div> <!-- /.row -->




				</div>
			</div>
		</section>

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