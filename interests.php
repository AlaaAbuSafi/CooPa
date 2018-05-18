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
		<section class="hero small-hero" style="background-image:url(assets/images/home-bg.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap">
						
					</div>
				</div>
			</div>
		</section>

		<!-- Blog Posts -->
		<section class="main container">
			<ul class="list-group" style="text-align: right;position: initial;float: right;width: 70%">
				<li class="list-group-item list-group-item-primary" style="background-color: rgb(65, 181, 244 ,0.6)">
				  	<span class="col-sm-8 col-md-7 ">البريد الإلكتروني</span>
				  	<span class="col-sm-8 col-md-4 ">الإسم</span>
				  	<span>الرقم</span>
				 </li>
				 <br>
					<?php
						require_once "users.php";
									
						require 'connect.php';

						$user = new User();
						$results = $user->allIntersts();
						foreach ($results as $result) : ?>	  
				  			<li class="list-group-item list-group-item-primary" style="background-color: rgb(65, 242, 171 ,0.6)">
				  				<span class="col-sm-8 col-md-7 "><?php echo $result['email'];?></span>
				  				<span class="col-sm-8 col-md-4 "><?php echo $result['name'];?></span>
				  				<span><?php echo $result['id'];?></span>
				  			</li>
				  			<br>
				  	<?php  endforeach ?>
			  
			</ul>
		</section>

		<!-- Contact Us -->
		<?php 
		require_once 'layouts/contact.php';
		 ?>

        <!-- Footer -->
		<?php 
		require_once 'layouts/footer.php';
		 ?>

		 <!-- Mail Form -->
		<div id="sendEmail" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">                   	
                        <div class="modal-header" style="text-align:center">
                            <h2>إرسال رسالة</h2>
								<p class="lead">أرسل رسالة لجميع متابعين الجمعية </p>
                        </div>
                        <div class="modal-body">
                        	
                            <form role="form" method="post" action="interests.php" id="reused_form">

                            	<div class="form-group" style="text-align:right;">
                                    <input type="text" class="form-control" id="name" name="title" required maxlength="100" rows="6" placeholder="عنوان الموضوع *" value="" style="text-align:right;">
                                </div>

                                <div class="form-group" style="text-align:right;">
                                    <textarea type="textarea" class="form-control" id="name" name="mailBody" required maxlength="100" rows="6" placeholder="نص الرسالة *" value="" style="text-align:right;"></textarea>
                                </div>
                                <input type="submit" name="sendEmail" class="display-block" style="margin: 0 auto;" value="&larr; إرسال"></input>
                            </form>
                            
                        </div>
                    </div>
                </div>
        </div>
<!-- End Mail Form -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>

