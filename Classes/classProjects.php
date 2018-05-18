<?php
	
	class Projects
	{

		public function startProject($id)
		{
			require 'connect.php';
			
			$query = "UPDATE project SET pStatus = '4' WHERE id = '$id'";
				
			$results = mysqli_query($conn, $query);

			return $results;

		}


				

	}

?>