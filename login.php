<?php

	$servername = "localhost";
	$username = "id5243120_mayank";
	$password = "mayank";
	$dbname = "id5243120_health1";

	if(!empty($_POST))
		{
			$conn = mysqli_connect($servername, $username, $password, $dbname);	// create connection

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
				$password = md5($_POST['password']);

				if($hash == "236e4178a240cb4f09a5171d368f95d7")		// check hash
				{

					$sql = "SELECT username, password FROM user where username = '".$username."' and password = '".$password."';";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0)
					{
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result))
					    {
					        echo "1";	//page redirect
					    }
					} 
					else 
					{
						echo "2";	//page redirect
					}
				}
				else
				{
					echo "invalid request because no hash";
				}
			}
		}
		else
		{
			echo "no post. major error.";
		}
?>

