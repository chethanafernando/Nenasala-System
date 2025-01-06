<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$fid = mysqli_real_escape_string($link, $_REQUEST['fid']);
	$course1 = mysqli_real_escape_string($link, $_REQUEST['chk1']);
	$course2 = mysqli_real_escape_string($link, $_REQUEST['chk2']);
	$course3 = mysqli_real_escape_string($link, $_REQUEST['chk3']);
	$course4 = mysqli_real_escape_string($link, $_REQUEST['chk4']);
	$course5 = mysqli_real_escape_string($link, $_REQUEST['chk5']);
	$course6 = mysqli_real_escape_string($link, $_REQUEST['chk6']);
	$course7 = mysqli_real_escape_string($link, $_REQUEST['chk7']);
	$course8 = mysqli_real_escape_string($link, $_REQUEST['chk8']);
	$course9 = mysqli_real_escape_string($link, $_REQUEST['chk9']);
	$course10 = mysqli_real_escape_string($link, $_REQUEST['chk10']);
	$course11 = mysqli_real_escape_string($link, $_REQUEST['chk11']);
	$course12 = mysqli_real_escape_string($link, $_REQUEST['chk12']);
	$course13 = mysqli_real_escape_string($link, $_REQUEST['chk13']);
	$course14 = mysqli_real_escape_string($link, $_REQUEST['chk14']);
	$fee = mysqli_real_escape_string($link, $_REQUEST['fee']);
	$regfee = mysqli_real_escape_string($link, $_REQUEST['regfee']);
	$finstall = mysqli_real_escape_string($link, $_REQUEST['finstall']);
	$fdis = mysqli_real_escape_string($link, $_REQUEST['fdis']);
	
	$course = $course1 ."   ". $course2 ."   ". $course3 ."   ". $course4 ."   ". $course5 ."   ". $course6 ."   ". $course7 ."   ". $course8 ."   ". $course9 ."   ". $course10 ."   ". $course11 ."   ". $course12 ."   ". $course13 ."   ". $course14;

// attempt insert query execution
	$sql = "INSERT INTO fee (Fee_Id, Course_Name, Fee, Registration_Fee, Installments, Discount) 
			values('$fid ', '$course', '$fee', '$regfee', '$finstall', '$fdis')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='fee.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>