<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$id = mysqli_real_escape_string($link, $_REQUEST['id']);
	$name = mysqli_real_escape_string($link, $_REQUEST['name']);
	$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
	$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
	$gen = mysqli_real_escape_string($link, $_REQUEST['gender']);
	$role = mysqli_real_escape_string($link, $_REQUEST['role']);
	$address = mysqli_real_escape_string($link, $_REQUEST['address']);
	$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);
	$quali = mysqli_real_escape_string($link, $_REQUEST['quali']);
	$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
	$regdate = mysqli_real_escape_string($link, $_REQUEST['regdate']);

	$sql = "UPDATE employee SET Name='$name', Nic='$nic', Dob='$dob', Gender='$gen', Role='$role', Address='$address', Contact='$contact', Email='$email', Qualification='$quali', Salary='$salary', Reg_Date='$regdate' WHERE Employee_Id='$id'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='employee.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>