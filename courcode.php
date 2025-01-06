<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$cid = mysqli_real_escape_string($link, $_REQUEST['cid']);
	$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
	$cfee = mysqli_real_escape_string($link, $_REQUEST['cfee']);
	$type1 = mysqli_real_escape_string($link, $_REQUEST['chk1']);
	$type2 = mysqli_real_escape_string($link, $_REQUEST['chk2']);
	$type3 = mysqli_real_escape_string($link, $_REQUEST['chk3']);
	$cduration = mysqli_real_escape_string($link, $_REQUEST['cduration']);
	$cvenue = mysqli_real_escape_string($link, $_REQUEST['cvenue']);
	$cday = mysqli_real_escape_string($link, $_REQUEST['cday']);
	$ctime = mysqli_real_escape_string($link, $_REQUEST['ctime']);
	$cstdate = mysqli_real_escape_string($link, $_REQUEST['cstdate']);
	$ceddate = mysqli_real_escape_string($link, $_REQUEST['ceddate']);
	$csubjects = mysqli_real_escape_string($link, $_REQUEST['csubjects']);
	$coverview = mysqli_real_escape_string($link, $_REQUEST['coverview']);
	
	$type = $type1 ."   ". $type2 ."   ". $type3 ."   ";

// attempt insert query execution
	$sql = "INSERT INTO course (Course_Id, Name, Fee, Course_Type, Duration, Venue, Day, Time, Start_Date, End_Date, Subjects, Overview) 
			values('$cid ', '$cname', '$cfee ', '$type', '$cduration', '$cvenue', '$cday', '$ctime', '$cstdate', '$ceddate', '$csubjects', '$coverview')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='course.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>