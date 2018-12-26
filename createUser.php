
	<?php

		$servername = "localhost";
		$username = "id5243120_mayank";
		$password = "mayank";
		$dbname = "id5243120_health1";

		if(!empty($_POST))
		{
			$conn = mysqli_connect($servername, $username, $password, $dbname);		// Create connection

			if(!$conn )
			{
				die('Could not connect: ' . mysqli_error($conn));
			}

			if(!isSet($_POST['hash']))
			{
				echo "Invalid request beacuse no hash.";
			}
			else
			{
				$hash = $_POST['hash'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$dob = $_POST['dob'];
				$bloodgroup = $_POST['bloodgroup'];
				

				if($hash == "236e4178a240cb4f09a5171d368f95d7")		// check hash
				{
					$sql = "INSERT INTO user (username, password, firstname, lastname, dob, bloodgroup) VALUES('".$username."','".md5($password)."','".$firstname."','".$lastname."','".$dob."','".$bloodgroup."')";
				
					$retval = mysqli_query( $conn, $sql );

					if(! $retval )
					{
						echo "2";		// page redirect
					}
					else echo "1";		// page redirect

					mysqli_close($conn);
				}
				else
				{
					echo "Invalid request beacuse invalid hash";
				}
			}
			
		}
		else {echo "major error";}
	?>