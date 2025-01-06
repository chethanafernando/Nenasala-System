<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
	die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
$empid = mysqli_real_escape_string($link, $_REQUEST['empid']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$nic = mysqli_real_escape_string($link, $_REQUEST['nic']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$gen = mysqli_real_escape_string($link, $_REQUEST['gen']);
$role = mysqli_real_escape_string($link, $_REQUEST['role']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$quali = mysqli_real_escape_string($link, $_REQUEST['quali']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$regdate = mysqli_real_escape_string($link, $_REQUEST['regdate']);

// attempt insert query execution
$sql = "INSERT INTO employee (Employee_Id, Name, Nic, Dob, Gender, Role, Address, Contact, Email, Qualification, Salary,  Reg_Date) 
values('$empid', '$name', '$nic', '$dob', '$gen', '$role', '$address', '$contact', '$email', '$quali', '$salary', '$regdate')";
if(mysqli_query($link, $sql)){
	echo "<script>
		alert('***** Data Submitted Successfully *****');
		window.location.href='employee.php';
		</script>";
}
else{echo"ERROR: Could not be able to execute";
}

//close connection
mysqli_close($link);
 
?>