<?php  

class User{
	

	public function login($username,$password)
	{
		require 'connect.php';
		session_start();

		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$results = mysqli_query($conn, $query);
			//if (mysqli_num_rows($results) == 1) {
				//$_SESSION['username'] = $username;
				//$_SESSION['success'] = "You are now logged in";
				//header('location: http://localhost/dashboard/OOP/member.php');
			//}

			if ($results) {
				$rows = $results-> fetch_assoc();
				$username = $rows['userName'];
				$_SESSION['UserName'] = $username;
			}
			return $results;
	}

	public function register($username,$fname,$mname,$lname,$email,$password,$phone,$gender,$bankAccountNo)
	{
		require 'connect.php';
		session_start();

		$query = "INSERT INTO user (userName, fName, mName, lName, email, password, phone, type, gender, bankAccountNo) 
					  VALUES('$username', '$fname', '$mname', '$lname', '$email', '$password', '$phone', '1', '$gender', '$bankAccountNo')";
			$results = mysqli_query($conn, $query);
			
			if ($results) {
				$_SESSION['UserName'] = $username;
			}
			echo $gender;
			echo("Error description: " . mysqli_error($conn));
			
			return $results;
	}

	public function contact_us($name,$phone,$message,$date)
	{
		require 'connect.php';

		$query = "INSERT INTO contactus (name, phone, message, date) 
					  VALUES('$name', '$phone', '$message', '$date')";
			$results = mysqli_query($conn, $query);
			
			
			return $results;
	}

	public function gestContact_us($name,$email)
	{
		require 'connect.php';

		$query = "INSERT INTO interests (name, email) 
					  VALUES('$name', '$email')";
			$results = mysqli_query($conn, $query);
			//if (mysqli_num_rows($results) == 1) {
				//$_SESSION['username'] = $username;
				//$_SESSION['success'] = "You are now logged in";
				//header('location: http://localhost/dashboard/OOP/member.php');
			//}
			
			return $results;
	}




	public function upload_Image($image,$username)
		{
			require '../connect.php';

			
				
				$query = "UPDATE user SET picture = '$image' WHERE username = '$username'";
				
				//$query = "INSERT INTO user (fName) VALUES ('alaalaal') ";
				$results = mysqli_query($conn, $query);



			return $results;

		}

		public function get_Image($username)
		{
			require '../connect.php';

			$query = "SELECT picture FROM user WHERE username='$username'";
			
			$result = mysqli_query($conn, $query);

			return $result;
		}

		public function projectProposal($title,$proposal,$date,$proposeUsername)
		{
			require 'connect.php';

			$query = "INSERT INTO projectProposal (title, proposal, date, proposeUserName) 
					  VALUES('$title', '$proposal', '$date', '$proposeUsername')";
			$results = mysqli_query($conn, $query);
			 //echo("Error description: " . mysqli_error($conn));

			return $results;
		}

		public function allNews()
		{
			require 'connect.php';

			$query = "SELECT * FROM advert ORDER BY id DESC";
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $rows;
		}

		public function userInfo($username)
		{
			require 'connect.php';

			$query = "SELECT * FROM user WHERE username='$username'";
			
			$results = mysqli_query($conn, $query);
			$rows = $results-> fetch_assoc();

 			return $rows;
		}

		public function allProject()
		{
			require 'connect.php';

			$query = "SELECT * FROM project ORDER BY id DESC";
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $rows;
		}

		public function addAdvert($title,$content,$date,$username)
		{
			require 'connect.php';

			$query = "INSERT INTO advert (title, content, date, userName) 
					  VALUES('$title', '$content', '$date', '$username')";
			$results = mysqli_query($conn, $query);
			 //echo("Error description: " . mysqli_error($conn));
			

			return $results;
		}

		public function updateAdvert($id,$title,$content,$date,$generalId)
		{
			require 'connect.php';

			$query = "UPDATE advert SET title = '$title', content= '$content', date = '$date',userName = '$generalId' WHERE id = $id;";
			$results = mysqli_query($conn, $query);

			return $results;
		}

		public function deleteAdvert($id)
		{
			require 'connect.php';

			$query = "DELETE FROM advert WHERE id='$id'";
			$results = mysqli_query($conn, $query);

			return $results;
		}

		public function ignoredProjects($title,$proposal,$date,$generalId,$proposeUserName,$rate)
		{
			require 'connect.php';

			$query = "INSERT INTO project (name, description, confirmDate, acceptUserName, proposeUserName, rate, pStatus) 
					  VALUES('$title', '$proposal', '$date', '$generalId', $proposeUserName, '$rate', '3')";

			
			$results = mysqli_query($conn, $query);

			return $results;
		}

		public function allProposal()
		{
			require 'connect.php';

			$query = "SELECT * FROM projectproposal ORDER BY id DESC";
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $rows;
		}

		public function deleteProposal($id)
		{
			require 'connect.php';

			$query = "DELETE FROM projectproposal WHERE id='$id'";
			$results = mysqli_query($conn, $query);

 			return $results;
		}

		public function allmessages()
		{
			require 'connect.php';

			$query = "SELECT * FROM contactus ORDER BY id DESC";
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $rows;
		}

		public function allIntersts()
		{
			require 'connect.php';

			$query = "SELECT * FROM interests ORDER BY id DESC";
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $rows;
		}

		public function doRate($id,$rateText)
		{
			require 'connect.php';

			$query = "UPDATE projectproposal SET rate = '$rateText' WHERE id = $id;";
			$results = mysqli_query($conn, $query);

 			return $results;
		}

		public function InsertFinance($id,$total,$generalId,$pStatus)
		{
			require 'connect.php';

			$query = "SELECT * FROM projectproposal WHERE id='$id'";
			
			$results = mysqli_query($conn, $query);
			$rows = $results-> fetch_assoc();
			$title = $rows['title'];
			$proposal = $rows['proposal'];
			$confirmDate = date("Y.m.d");
			$rate = $rows['rate'];
			$proposeUserName = $rows['proposeUserName'];


			$query2 = "INSERT INTO project (name, description, totalPremium, confirmDate, acceptUserName, proposeUserName, rate, pStatus) 
					  VALUES('$title', '$proposal', '$total', '$confirmDate', '$generalId', $proposeUserName, '$rate', '$pStatus')";
			$results2 = mysqli_query($conn, $query2);

 			return $results2;
		}

		public function userProjects($id)
		{
			require 'connect.php';
			

			$query = "SELECT DISTINCT * FROM project_subscribers s, user u, project t where s.userName = u.userName AND s.projectId = t.id AND s.userName = '$id'";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;

	 		}

 			return $results;
		}

		public function enrollToProject($generalId,$id)
		{
			require 'connect.php';
			

			$query = "INSERT INTO project_subscribers (userName, projectId) VALUES($generalId, $id)";

			$results = mysqli_query($conn, $query);
			

 			return $results;
		}

		public function getProjectSubscribers($id)
		{
			require 'connect.php';
			

			$query = "SELECT DISTINCT userName FROM project_subscribers where projectId = '$id'";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function removeFromProject($generalId,$id)
		{
			require 'connect.php';
			

			$query = "DELETE FROM project_subscribers WHERE userName = '$generalId' AND projectId = '$id'";

			$results = mysqli_query($conn, $query);
			

 			return $results;
		}

		public function insertMonyToProject2($id,$uBalance,$generalId,$mony)
		{
			require 'connect.php';

			$query = "INSERT INTO projectInvestment (proId, investUserId, amount) VALUES('$id', '$generalId', '$mony')";

			$results = mysqli_query($conn, $query);

			$query2 = "UPDATE user SET userBalance = '$uBalance' WHERE id = $generalId;";
			$results2 = mysqli_query($conn, $query2);

 			return $results;
		}

		public function removeFromProject2($generalId,$id)
		{
			require 'connect.php';
			

			$query = "DELETE FROM projectInvestment WHERE proId = '$id' AND investUserId = '$generalId'";

			$results = mysqli_query($conn, $query);
			

 			return $results;
		}

		public function allUsers()
		{
			require 'connect.php';
			

			$query = "SELECT DISTINCT * FROM user";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function allInvesters()
		{
			require 'connect.php';
			

			$query = "SELECT DISTINCT * FROM projectInvestment";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function getInfoFromBankNo($bankNo)
		{
			require 'connect.php';

			$query = "SELECT * FROM user WHERE bankAccountNo='$bankNo'";
			
			$results = mysqli_query($conn, $query);
			$rows = $results-> fetch_assoc();

 			return $rows;
		}

		

		
		public function updateUserBalance($id,$uBalance)
		{
			require 'connect.php';

			$query = "UPDATE user SET userBalance = '$uBalance' WHERE userName = '$id'";
			$results = mysqli_query($conn, $query);

 			return $results;
		}

		public function getEmails()
		{
			require 'connect.php';
			

			$query = "SELECT email FROM interests";
			
			$results = mysqli_query($conn, $query);
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
			
		}

		public function updateUserType($id,$userType)
		{
			require 'connect.php';

			$query = "UPDATE user SET type = '$userType' WHERE userName = '$id'";
			$results = mysqli_query($conn, $query);

 			return $results;
		}



	}	
?>