<?php
	
	class Payment
	{

		public function confirmPayment($paidUserId,$confirmUserId,$paymentDate,$paymentType)
		{
			require 'connect.php';


			$query = "INSERT INTO payment (paidUserId, confirmUserId, paymentDate, type) VALUES('$paidUserId', '$confirmUserId', '$paymentDate', '$paymentType')";
			$results = mysqli_query($conn, $query);

			return $results;
		}

		public function allPayments()
		{
			require 'connect.php';

			$query = "SELECT DISTINCT * FROM payment ORDER BY id DESC";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function allPremiumPayment()
		{
			require 'connect.php';

			$query = "SELECT DISTINCT * FROM premiumpayment ORDER BY id DESC";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function projectSchedule($proId,$month,$year,$monthNo,$amount)
		{
			require 'connect.php';


			$query = "INSERT INTO projectPayment (proId, month, year, monthNumber, amount) VALUES('$proId', '$month', '$year', '$monthNo', '$amount')";
			$results = mysqli_query($conn, $query);
			//echo("Error description: " . mysqli_error($conn));
			return $results;
		}

		public function allProSchedule()
		{
			require 'connect.php';
			

			$query = "SELECT DISTINCT * FROM projectPayment ORDER BY monthNumber DESC";
			
			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
		}

		public function confirmPaymentProject($lastID,$projectId)
		{
			require 'connect.php';


			$query = "INSERT INTO premiumpayment (paymentId, proId) VALUES('$lastID', '$projectId')";
			$results = mysqli_query($conn, $query);
			return $results;
		}

		public function getLastPaymentIDType1(){
			require 'connect.php';

			$query = "SELECT * from payment WHERE type = 1 order by id ASC";


			$results = mysqli_query($conn, $query);
			
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}
	 		//echo("Error description: " . mysqli_error($conn));
 			return $rows;
		}

		public function getScheduleAmount($projectId,$monthNo)
		{
			require 'connect.php';
			

			$query = "SELECT amount FROM projectpayment WHERE proId='$projectId' AND monthNumber='$monthNo'";
			
			$results = mysqli_query($conn, $query);
			$rows = array();

	 		while($row = $results-> fetch_assoc()){

	 			$rows[] = $row;
	 		}

 			return $rows;
			
		}



	}

?>