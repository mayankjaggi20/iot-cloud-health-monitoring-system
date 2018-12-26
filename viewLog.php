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
					        
					        $rth="SELECT * from logs where username = '".$username."';";
					        $sth = mysqli_query($conn,$rth);
							$rows = array();
							while($r = mysqli_fetch_assoc($sth)) {
							    array_push($rows, $r);
							}
							print json_encode($rows)."<br>";
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
		else {echo "major error";}
	?>