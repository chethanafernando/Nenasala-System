<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$sid = mysqli_real_escape_string($link, $_REQUEST['sid']);
	$name = mysqli_real_escape_string($link, $_REQUEST['name']);
	$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
	$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
	$gen = mysqli_real_escape_string($link, $_REQUEST['gen']);
	$address = mysqli_real_escape_string($link, $_REQUEST['address']);
	$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);
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
	$regdate = mysqli_real_escape_string($link, $_REQUEST['regdate']);
	
	$course = $course1 ."   ". $course2 ."   ". $course3 ."   ". $course4 ."   ". $course5 ."   ". $course6 ."   ". $course7 ."   ". $course8 ."   ". $course9 ."   ". $course10 ."   ". $course11 ."   ". $course12 ."   ". $course13 ."   ". $course14;

// attempt insert query execution
	$sql = "INSERT INTO student (Student_Id, Name, Nic, Dob, Gender, Address, Contact, Email, Course, Reg_Date) 
			values('$sid', '$name', '$nic', '$dob', '$gen', '$address', '$contact', '$email', '$course', '$regdate')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='student.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>