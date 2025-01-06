<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$eid = mysqli_real_escape_string($link, $_REQUEST['eid']);
	$regno = mysqli_real_escape_string($link, $_REQUEST['regno']);
	$sid = mysqli_real_escape_string($link, $_REQUEST['sid']);
	$sname = mysqli_real_escape_string($link, $_REQUEST['sname']);
	$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
	$sub = mysqli_real_escape_string($link, $_REQUEST['sub']);
	$testtype1 = mysqli_real_escape_string($link, $_REQUEST['testtype1']);
	$testtype2 = mysqli_real_escape_string($link, $_REQUEST['testtype2']);
	$testtype3 = mysqli_real_escape_string($link, $_REQUEST['testtype3']);
	$venue = mysqli_real_escape_string($link, $_REQUEST['venue']);
	$date = mysqli_real_escape_string($link, $_REQUEST['date']);
	$time = mysqli_real_escape_string($link, $_REQUEST['time']);
	$duration = mysqli_real_escape_string($link, $_REQUEST['duration']);

	$type = $testtype1 ."  ". $testtype2 ."  ". $testtype3;

// attempt insert query execution
	$sql = "INSERT INTO registerexam (Exam_Id, Registration_No, Student_Id, Student_Name, Course_Name, Subject, Test_Type, Venue, Date, Time, Duration) 
			values('$eid', '$regno', '$sid', '$sname', '$cname', '$sub', '$type', '$venue', '$date', '$time', '$duration')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Submited Successfully *****');
				window.location.href='printexamadmission.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>