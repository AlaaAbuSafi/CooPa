<?php
	session_start();
	require_once "../users.php";
	$errors = array();
	$user = new User(); 

		if (isset($_SESSION['UserName'])){
			require '../connect.php';
			
			

			if (isset($_GET['id'])) {
				$username = $_GET['id'];
			}
			else{
				$username = $_SESSION['UserName'];
			} 

			if (isset($_POST['upload'])) {

				// Get image name
		  		$image = $_FILES['image']['name'];

		  		// image file directory
		  		$target = "images/".basename($image);
				
				if (empty($image)) {
				array_push($errors, "Image feald is required");
				}
				if (count($errors) == 0) {
					$results = $user->upload_Image($image,$username);
					if ($results) {
						if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
							//echo "file uploaded";
						}
						else{
							echo "file not uploaded";
						}
					}
					else{
						echo "query not executed";
					}
				}
			
			}		
			$result = $user->get_Image($username);
			while ($row = mysqli_fetch_array($result)){
				$path =$row['picture'];	 
			}

			$info = $user->userInfo($username);
			$fname = $info['fName'];
			$mname = $info['mName'];
			$lname = $info['lName'];
			$email = $info['email'];
			$phone = $info['phone'];
			$type = $info['type'];
			$gender = $info['gender'];
					
		}

?>
<!DOCTYPE HTML>
<html>
	<head>
	
		<title>Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>


		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="../assets/css/owl-carousel.css" media="screen">
		<link rel="stylesheet" href="../assets/css/design.css" media="screen">
		
		
	</head>
	<body>

	<!-- Header -->
		<?php 
		require_once 'header.php';
		 ?>


<div id="page" style="display: block;">	
	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:url(images/cover_bg_333.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay" style="background-color: rgb(132, 137, 145, 0.7)"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
						

							<form method="POST" action="profile.php" enctype="multipart/form-data">
							  	<input type="hidden" name="size" value="1000000">
							  	<div>
							  	  <input type="file" name="image" accept=".jpg, .jpeg, .png" class="profile-thumb" style="background: url(images/<?php echo $path; ?>);">	  
							  	</div>
							  	
							  	<div>
							  		
							  		<input type="submit" name="upload">
							  	</div>
							 </form>
							<h1 style="transform: rotate(0deg);"><span>
									<?php  
										echo $info['fName']."&nbsp".$info['lName'];
									?>
								</span></h1>
							<h2>
									<?php
										switch ($type) {
										  	case '0':
										  		echo "عضو";
										  		break;
										  	case '1':
										  		echo "رئيس اللجنة";
										  		break;
										  	case '2':
										  		echo "أمين الصندوق";
										  		break;
										  	case '3':
										  		echo "أمين السر";
										  		break;
										  	case '4':
										  		echo "المحاسب";
										  		break;
										  	case '5':
										  		echo "المستشار";
										  		break;					
										  	
										  	default:
										  		echo "صلاحية المستخدم";
										  		break;
										  }  
									?>
							</h2>
							<p>
								<ul class="fh5co-social-icons">
									<li><a href="#"><i class="icon-twitter2"></i></a></li>
									<li><a href="#"><i class="icon-facebook2"></i></a></li>
									<li><a href="#"><i class="icon-linkedin2"></i></a></li>
									<li><a href="#"><i class="icon-dribbble2"></i></a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading" style="margin-bottom: 0px;">
					<h2>معلوماتي الشخصية</h2>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-8" style="text-align: right;">
					<ul class="info">
						<?php if ($_SESSION['UserName'] == $info['userName']) : ?>  
							<li><p style="display: inline;">
									رقم المستخدم :
									&nbsp;
									<?php  
										echo $info['userName'];
									?>
								</p>
							</li>
						<?php  endif ?>
							
						<li><p style="display: inline;">
							الإسم الكامل :
							&nbsp;
							<?php  
								echo $info['fName']."&nbsp".$info['mName']."&nbsp".$info['lName'];
							?>
						</p></li>
						<li><p style="display: inline;">
							رقم الهاتف :
							&nbsp;
							<?php  
								echo $info['phone'];
							?>
						</p></li>
						<li>
							<span><?php echo $info['email'];?></span>
							<span>: البريد الإلكتروني &nbsp;</span>
						</li>
						<li><p style="display: inline;">
							الجنس :
							&nbsp;
							<?php
								switch ($gender) {
									case '1':
										echo "ذكر";
										break;
									case '2':
										echo "أنثى";
										break;
										  	
									default:
										echo "الجنس";
										break;
								}  
							?>
						</p></li>
						<?php if ($_SESSION['UserName'] == $info['userName']) : ?>  
							<li><p style="display: inline;">
									 رقم حساب البنك :
									&nbsp;
									<?php  
										echo $info['bankAccountNo'];
									?>
								</p>
							</li>
						<?php  endif ?>
					</ul>
					
				</div>
				<div class="col-md-4" style="text-align: right;">
					
				</div>
			</div>
		</div>
	</div>

</div>

	<!-- Footer -->
		<?php 
		require_once '../layouts/footer.php';
		 ?>

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Easy PieChart -->
	<script src="js/jquery.easypiechart.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	
	<!-- Main -->
	<script src="js/main.js"></script>

	

	</body>
</html>

