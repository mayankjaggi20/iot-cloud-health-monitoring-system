	<?php

		$servername = "localhost";
		$username = "id5243120_mayank";
		$password = "mayank";
		$dbname = "id5243120_health1";

		// Create connection
		if(!empty($_POST))
		{
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if(! $conn )
			{
				echo "db couldnt connect";
			}
			if(!isSet($_POST['hash']))
			{
				echo "Invalid request beacuse no hash.";
			}
			else
			{
				$hash = $_POST['hash']; //string for hash is 'mayankisthebest'
				$temp = $_POST['temp'];
				$pulse = $_POST['pulse'];
				$ecg=$_POST['ecg'];
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				
				if($hash == "236e4178a240cb4f09a5171d368f95d7")	// check hash
				{
					$sql = "SELECT username, password FROM user where username = '".$username."' and password = '".$password."';";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0)
					{
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result))
					    {
					        //echo "login successful";
					        $sql = "INSERT INTO logs (username, temp, pulse, ecg) VALUES('".$username."',".$temp.",".$pulse.",'".$ecg."');";
					
							$retval = mysqli_query( $conn,$sql );
							if(! $retval )
							{
								echo "error" .  mysqli_error($conn);
							}
							else echo "1";		//page redirect
							mysqli_close($conn);
						}
					} 
					else 
					{
						echo "username password not found";
					}
				}
				else
				{
					echo "Invalid request because hash wrong";
				}
			}
		}
		else {echo "major error. no post";}
	?>