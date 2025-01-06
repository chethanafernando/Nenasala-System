<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$exid = mysqli_real_escape_string($link, $_REQUEST['exid']);
	$exname = mysqli_real_escape_string($link, $_REQUEST['exname']);
	$chk1 = mysqli_real_escape_string($link, $_REQUEST['chk1']);
	$chk2 = mysqli_real_escape_string($link, $_REQUEST['chk2']);
	$chk3 = mysqli_real_escape_string($link, $_REQUEST['chk3']);
	$chk4 = mysqli_real_escape_string($link, $_REQUEST['chk4']);
	$chk5 = mysqli_real_escape_string($link, $_REQUEST['chk5']);
	$chk6 = mysqli_real_escape_string($link, $_REQUEST['chk6']);
	$chk7 = mysqli_real_escape_string($link, $_REQUEST['chk7']);
	$chk8 = mysqli_real_escape_string($link, $_REQUEST['chk8']);
	$chk9 = mysqli_real_escape_string($link, $_REQUEST['chk9']);
	$chk10 = mysqli_real_escape_string($link, $_REQUEST['chk10']);
	$chk11 = mysqli_real_escape_string($link, $_REQUEST['chk11']);
	$chk12 = mysqli_real_escape_string($link, $_REQUEST['chk12']);
	$chk13 = mysqli_real_escape_string($link, $_REQUEST['chk13']);
	$chk14 = mysqli_real_escape_string($link, $_REQUEST['chk14']);
	$exsubjects = mysqli_real_escape_string($link, $_REQUEST['exsubjects']);
	$extype1 = mysqli_real_escape_string($link, $_REQUEST['extype1']);
	$extype2 = mysqli_real_escape_string($link, $_REQUEST['extype2']);
	$extype3 = mysqli_real_escape_string($link, $_REQUEST['extype3']);
	$exvenue = mysqli_real_escape_string($link, $_REQUEST['exvenue']);
	$exdate = mysqli_real_escape_string($link, $_REQUEST['exdate']);
	$extime = mysqli_real_escape_string($link, $_REQUEST['extime']);
	$exduration = mysqli_real_escape_string($link, $_REQUEST['exduration']);
	
	$course = $chk1 ."   ". $chk2 ."   ". $chk3 ."   ". $chk4 ."   ". $chk5 ."   ". $chk6 ."   ". $chk7 ."   ". $chk8 ."   ". $chk9 ."   ". $chk10 ."   ". $chk11 ."   ". $chk12 ."   ". $chk13 ."   ". $chk14;
	$testtype = $extype1 ."   ". $extype2 ."   ". $extype3;
// attempt insert query execution
	$sql = "INSERT INTO exam (Exam_Id, Name, Course_Name, Subject, Test_Type, Venue, Date, Time, Duration) 
			values('$exid', '$exname', '$course ', '$exsubjects', '$testtype', '$exvenue', '$exdate', '$extime', '$exduration')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='exam.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>