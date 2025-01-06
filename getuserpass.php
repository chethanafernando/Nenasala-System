<?php
$usernme = $_POST["user"];
$passwrd = $_POST["pass"];

//echo $username;
//echo $password;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nenasala_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	//check connection
	if($conn->connect_error) 
		{
		die("Connection failed: " . $conn->connect_error);
		}
	$sql = "SELECT * FROM login";
	$result = $conn->query($sql);
		if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc()){
				$user=$row["username"];
				$pass=$row["password"];
				$role=$row["Role"];
				//echo $user;
				//echo $pass;
			}
			} 
		if(($usernme == $user) && ($passwrd == $pass) && ($role == 'Administrator'))
			{
				echo "<script type='text/javascript'>
						window.location.href='home.php';
					</script>";
			}
			else if(($usernme == $user) && ($passwrd == $pass) && ($role == 'Supervisor'))
			{
				echo "<script type='text/javascript'>
						window.location.href='home1.php';
					</script>";
			}
		else
			{
				echo "<script type='text/javascript'>
						alert('Username or Password Incorrect!!!');
						window.location.href='login.php';
					</script>";
			}
?>