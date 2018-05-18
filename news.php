<?php 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

	if (isset($_GET['id'])) {
		require_once "users.php";
								
		require 'connect.php';

		$user2 = new User();
		$results = $user2->allNews();
		foreach ($results as $result){
			if ($result['id'] == $_GET['id']) {
				$id = $result['id'];
				$title = $result['title'];
				$content = $result['content'];
				$date = $result['date'];
				$username = $result['userName'];
			}	
		}
		$generalId = $_SESSION['UserName'];
		$about = $user2->userInfo($generalId);
		$id = $_GET['id'];

		if(isset($_POST['updateAdvert'])) {
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$content = mysqli_real_escape_string($conn, $_POST['content']);
			$date = date("Y.m.d");
			$updateAdvert = $user2->updateAdvert($id,$title,$content,$date,$generalId);
			header('location: news.php?id='.$id.'');
		}
		
		if(isset($_POST['delete'])) {
			$deleteAdvert = $user2->deleteAdvert($id);
			header('location: CooPaNews.php');
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
		<section class="hero small-hero" style="background-image:url(assets/images/advert.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap" style="float: right; position: initial; margin-top: 300px;">
						<h1 class="intro-title"><?php echo $title; ?></h1>
					</div>
				</div>
			</div>
		</section>

		<!-- Main Section -->
		<section class="main container">

			<div id="content" class="row">
				<div class="col-sm-8 col-md-6 col-md-push-3">
					<h3 style="text-align: right;"><?php echo $content; ?></h3>		
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
									
									<?php echo '<a href="Profile/profile.php?id='.$username.'">'; 
										$info = $user2->userInfo($username);
										echo $info['fName']."&nbsp".$info['mName']."&nbsp".$info['lName'];
									?>
								</a>
									</span>
								</span>
							</span>
							<i class="fa fa-user"></i>
						</div>
						<br>
						
					</div>

					
				</div>
			</div>

					<?php if ($about['type'] == 1 || $about['type'] == 3) : ?>
						<div>
							<br>
							<form  method="post" style="display: inline;">
								<a data-toggle="modal" data-target="#updateAdvert">
								<input type="submit" name="rate" value="تعديل" style="background-color:  #6dc234; border-radius: 20px;">
								</input>
									</a>
							</form>
							&nbsp; &nbsp;
							<form  method="post" style="display: inline;">
								<input type="submit" style="margin-right: 10px; border-radius: 20px;" name="delete" value="حذف"></input>
							</form>
						</div>
						
						
					<?php  endif ?>
					
		</section>

		<!-- Contact Us -->
		<?php 
		require_once 'layouts/contact.php';
		 ?>

        <!-- Footer -->
		<?php 
		require_once 'layouts/footer.php';
		 ?>

		 <!-- Update Advert Form -->
		<div id="updateAdvert" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">                   	
                        <div class="modal-header" style="text-align:center">
                            <h2>تعديل الإعلان</h2>
								<p class="lead">قم بتعديل هذا الإعلان</p>
                        </div>
                        <div class="modal-body">
                            <?php echo '<form role="form" method="post" action="news.php?id='.$id.'" id="reused_form" >'; ?>
                                <div class="form-group" style="text-align:right;">
                                	<label  for="name_field">: أدخل عنوان الإعلان</label>
                                    <input type="text" id="name" name="title"  <?php echo 'value="'.$title.'"' ; ?> style="text-align:right;">
                                    <br>
                                    <label  for="name_field">: أدخل محتوى الإعلان</label>
                                    <textarea type="textarea" class="form-control" id="name" name="content" required maxlength="100" rows="5" placeholder="تقييم مختصر *" style="text-align:right;"><?php echo ($content);?></textarea>
                                </div>
                                <input type="submit" name="updateAdvert" class="display-block" style="margin: 0 auto;" value="&larr; إرسال"></input>
                            </form>
                            
                        </div>
                    </div>
                </div>
        </div>
<!-- End Update Advert Form -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>