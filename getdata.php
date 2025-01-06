<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$uname = mysqli_real_escape_string($link, $_REQUEST['username']);
	$pass = mysqli_real_escape_string($link, $_REQUEST['password']);
	$role = mysqli_real_escape_string($link, $_REQUEST['role']);
	

// attempt insert query execution
	$sql = "INSERT INTO login (username, password, Role) 
			values('$uname', '$pass', '$role')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** User Account Created!!! *****');
				window.location.href='login.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>