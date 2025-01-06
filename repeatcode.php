<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$reid = mysqli_real_escape_string($link, $_REQUEST['reid']);
	$exid = mysqli_real_escape_string($link, $_REQUEST['exid']);
	$sid = mysqli_real_escape_string($link, $_REQUEST['sid']);
	$sname = mysqli_real_escape_string($link, $_REQUEST['sname']);
	$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
	$oresult = mysqli_real_escape_string($link, $_REQUEST['oresult']);
	$attemp = mysqli_real_escape_string($link, $_REQUEST['attemp']);
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
	$sql = "INSERT INTO repeatexam (Repeat_Id, Exam_Id, Student_Id, Student_Name, Older_Result, Attempt, Course_Name, Subject, Test_Type, Venue, Date, Time, Duration) 
			values('$reid', '$exid', '$sid', '$sname', '$oresult', '$attemp', '$cname', '$sub', '$type', '$venue', '$date', '$time', '$duration')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Submited Successfully *****');
				window.location.href='printrepeatadmission.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>