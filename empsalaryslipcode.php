<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$esalid = mysqli_real_escape_string($link, $_REQUEST['esalid']);
	$ename = mysqli_real_escape_string($link, $_REQUEST['ename']);
	$eid = mysqli_real_escape_string($link, $_REQUEST['eid']);
	$pos = mysqli_real_escape_string($link, $_REQUEST['pos']);
	$month = mysqli_real_escape_string($link, $_REQUEST['month']);
	$ewday = mysqli_real_escape_string($link, $_REQUEST['ewday']);
	$earday = mysqli_real_escape_string($link, $_REQUEST['earday']);
	$elvday = mysqli_real_escape_string($link, $_REQUEST['elvday']);
	$description = mysqli_real_escape_string($link, $_REQUEST['description']);
	$esalary = mysqli_real_escape_string($link, $_REQUEST['esalary']);
	$rupee = mysqli_real_escape_string($link, $_REQUEST['rupee']);
	$epdate = mysqli_real_escape_string($link, $_REQUEST['epdate']);
	$ebname = mysqli_real_escape_string($link, $_REQUEST['ebname']);
	$ebacc = mysqli_real_escape_string($link, $_REQUEST['ebacc']);

// attempt insert query execution
	$sql = "INSERT INTO employeesalaryslip (Emp_Sal_Id, Employee_Name, Employee_Id, Position, Month, Working_Day, Arrived_Day, Leave_Day, Description, Basic_Salary, Rupees, Date, Bank_Name, Bank_Account) 
			values('$esalid', '$ename', '$eid', '$pos', '$month', '$ewday', '$earday', '$elvday', '$description', '$esalary', '$rupee', '$epdate', '$ebname', '$ebacc')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Submited Successfully *****');
				window.location.href='printempslip.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>