<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$ceid = mysqli_real_escape_string($link, $_REQUEST['ceid']);
	$ceno = mysqli_real_escape_string($link, $_REQUEST['ceno']);
	$cesid = mysqli_real_escape_string($link, $_REQUEST['cesid']);
	$cecid = mysqli_real_escape_string($link, $_REQUEST['cecid']);
	$issue = mysqli_real_escape_string($link, $_REQUEST['issue']);
	$issuedate = mysqli_real_escape_string($link, $_REQUEST['issuedate']);

// attempt insert query execution
	$sql = "INSERT INTO certificate (Certificate_Id, Certificate_No, Student_Id, Course_Id, Issued, Issued_Date) 
			values('$ceid', '$ceno', '$cesid', '$cecid', '$issue', '$issuedate')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='certificate.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>