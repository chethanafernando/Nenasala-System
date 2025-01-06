<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$empid = mysqli_real_escape_string($link, $_REQUEST['empid']);
	$esempid = mysqli_real_escape_string($link, $_REQUEST['esempid']);
	$essalary = mysqli_real_escape_string($link, $_REQUEST['essalary']);
	$esmonth = mysqli_real_escape_string($link, $_REQUEST['esmonth']);
	$esdate = mysqli_real_escape_string($link, $_REQUEST['esdate']);
	$esaccno = mysqli_real_escape_string($link, $_REQUEST['esaccno']);
	$escredited = mysqli_real_escape_string($link, $_REQUEST['escredited']);

	$sql = "UPDATE employeesalary SET Employee_Id='$esempid', Salary='$essalary', Month='$esmonth', Date='$esdate', Account_Number='$esaccno', Credited='$escredited' WHERE EmpSalary_Id='$empid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='empsalary.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>