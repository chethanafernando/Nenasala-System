<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$esid = mysqli_real_escape_string($link, $_REQUEST['esid']);
	$esempid = mysqli_real_escape_string($link, $_REQUEST['esempid']);
	$essalary = mysqli_real_escape_string($link, $_REQUEST['essalary']);
	$month = mysqli_real_escape_string($link, $_REQUEST['month']);
	$date = mysqli_real_escape_string($link, $_REQUEST['date']);
	$accno = mysqli_real_escape_string($link, $_REQUEST['accno']);
	$credit1 = mysqli_real_escape_string($link, $_REQUEST['credit1']);
	$credit2 = mysqli_real_escape_string($link, $_REQUEST['credit2']);
	
	$credit = $credit1 ."   ". $credit2;

// attempt insert query execution
	$sql = "INSERT INTO employeesalary (EmpSalary_Id, Employee_Id, Salary, Month, Date, Account_Number, Credited) 
			values('$esid', '$esempid', '$essalary', '$month', '$date', '$accno', '$credit')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='empsalary.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>