<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$sid = mysqli_real_escape_string($link, $_REQUEST['id']);
	$name = mysqli_real_escape_string($link, $_REQUEST['name']);
	$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
	$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
	$gen = mysqli_real_escape_string($link, $_REQUEST['gender']);
	$address = mysqli_real_escape_string($link, $_REQUEST['address']);
	$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);
	$course = mysqli_real_escape_string($link, $_REQUEST['course']);
	$regdate = mysqli_real_escape_string($link, $_REQUEST['regdate']);

	$sql = "UPDATE student SET Name='$name', Nic='$nic', Dob='$dob', Gender='$gen', Address='$address', Contact='$contact', Email='$email', Course='$course', Reg_Date='$regdate' WHERE Student_Id='$sid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='student.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>