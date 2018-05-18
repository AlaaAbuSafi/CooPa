<!DOCTYPE html>
<html lang="en" class="cover">
	<head>
		<meta charset="utf-8">
		<title>تسجيل الإشتراك</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="assets/css/cutform.css" media="screen">


	</head>

	<body class="login">

		<div id="login">
			<a  href="index.php">
				<img id="image" src="assets/images/login.png" alt="Logo">
			</a>

			<form id="loginform" method="post"  action="signup.php">

				<?php //include('errors.php');?>

				<div id="rform">
					<p>
						<label for="user_login">رقم المستخدم<br>
						<input type="text" name="username" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>

					<p>
						<label for="user_login">إسم الأب<br>
						<input type="text" name="mname" id="user_login" class="input" value="" size="20" style="height: 40px;"></label>
					</p>

					<p>
						<label for="user_login">رقم الهاتف<br>
						<input type="phone" name="phone" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>

					<p>
						<label for="user_login">كلمة المرور<br>
						<input type="password" name="password_1" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>

					
					<p>
						<label for="user_login">رقم حساب البنك<br>
						<input type="number" name="bankAccountNo" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>
	
				</div>

				<div id="lform">

					<p>
						<label for="user_login">الإسم الأول<br>
						<input type="text" name="fname" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>

					<p>
						<label for="user_login">إسم العائلة<br>
						<input type="text" name="lname" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>

					<p>
						<label for="user_login">البريد الإلكتروني<br>
						<input type="email" name="email" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>
					
					<p>
						<label for="user_login">تأكيد كلمة المرور<br>
						<input type="password" name="password_2" id="user_login" class="input" required value="" size="20" style="height: 40px;"></label>
					</p>
					<p>
						<label for="user_login">الجنس<br>
						ذكر<input type='radio' name='gend' id="user_login" class="input" required value='1' style="width: 40px; "><br>
						أنثى<input type='radio' name='gend' id="user_login" class="input" required value='2' style="width: 40px;">
						</label>
					</p>
					
				</div>
				<div style="margin-left: 100px;">
					<input type="submit" name="reg_user" id="submit" class="button button-primary button-large" value="تسجيل الإشتراك" style=" margin-left: 5px;">
					
					<p style="color: white">
							هل أنت عضو بالفعل ؟   <a href="login.php"> تسجيل الدخول</a>
					</p>
				</div>
				</form>

		</div> 

	</body>
</html>


<?php
	require_once "users.php";
		$errors = array(); 

	if (isset($_POST['reg_user'])) {
		require 'connect.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$mname = mysqli_real_escape_string($conn, $_POST['mname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$gender = mysqli_real_escape_string($conn, $_POST['gend']);
		$bankAccountNo = mysqli_real_escape_string($conn, $_POST['bankAccountNo']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($fname)) {
			array_push($errors, "First Name is required");
		}
		if (empty($mname)) {
			array_push($errors, "Last Name is required");
		}
		if (empty($lname)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if (empty($password_2)) {
			array_push($errors, "Password confirm is required");
		}
		if (empty($phone)) {
			array_push($errors, "Username is required");
		}
		if (empty($gender)) {
			array_push($errors, "Username is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		if (count($errors) == 0) {
			$password = md5($password_1);
			$user = new User();
			$results = $user->register($username,$fname,$mname,$lname,$email,$password,$phone,$gender,$bankAccountNo);
			
			if ($results) {
				$about = $user->userInfo($username);
				if ($about['type'] == 6) {
					echo "<script type='text/javascript'>alert('لم يتم الموافقة على طلب العضوية الذي ارسلته');</script>";
					session_destroy();
					unset($_SESSION['UserName']);
				}else{
					header('location: member.php');
				}
			}
			else{
				array_push($errors, "Wrong inputs");
			}	
		}
		else{
			header('location: signup.php');
		}
	}
?>

