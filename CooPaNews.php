<?php 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CooPa News</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
		
	</head>

	<body class="blog">

		<div id="top"></div>

		<!-- Header -->
		<?php 
		require_once 'layouts/header.php';
		 ?>

		<!-- Hero Section -->
		<section class="hero small-hero" style="background-image:url(assets/images/advert.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap">
						
					</div>
				</div>
			</div>
		</section>

		<!-- Blog Posts -->
		<section class="main container">

			<!-- <hr class="small"></hr> -->

			<div class="row blog-posts">
				<div id="content" class="col-lg-12">
					<div class="row">
						<?php
							require_once "users.php";
								
							require 'connect.php';

							$user = new User();
							$results = $user->allNews();

							foreach ($results as $result) : ?>
								<div class="col-lg-3 col-md-4 col-sm-6">
									<article class="posts tag-fly tag-kids tag-location tag-planning tag-tickets tag-time-of-year tag-train tag-travel tag-vacation">
										<div class="card"  style="height: 250px;">
											<header class="entry-header">
												<?php
													$id_new = $result['id'];
													echo '<a href="news.php?id='.$id_new .'" rel="bookmark" style="height: 200px;">'; 
												?>
													<div class="entry-thumbnail" style="background-image: url(assets/images/advert.jpg); height: 200px;"></div>
														<h2 class="entry-title">
															<?php echo $result['title'];?>
														</h2>
												</a>
											</header>
											<footer class="entry-meta clearfix"> <span class="byline"><i class="fa fa-user"></i> <span class="author vcard">
												<?php
												$username = $result['userName'];
													echo '<a href="Profile/profile.php?id='.$username.'" rel="author">'; 

													$user2 = new User();
													$userId = $result['userName'];
													$info = $user2->userInfo($userId);
												
													echo  $info['fName'] . "&nbsp" . $info['mName'] . "&nbsp" . $info['lName'];
												
												?>
											</a></span></span> <span class="posted-on">
												<?php echo $result['date'] ?>
											</span> </footer>
										</div>
									</article>
								</div>

							<?php  endforeach ?>

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

