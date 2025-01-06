<?php

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
	
//Escape user inputs for security
	$reno = mysqli_real_escape_string($link, $_REQUEST['reno']);
	$sname = mysqli_real_escape_string($link, $_REQUEST['sname']);
	$sid = mysqli_real_escape_string($link, $_REQUEST['sid']);
	$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
	$saddress = mysqli_real_escape_string($link, $_REQUEST['saddress']);
	$sdate = mysqli_real_escape_string($link, $_REQUEST['sdate']);
	$samount = mysqli_real_escape_string($link, $_REQUEST['samount']);
	$srupee = mysqli_real_escape_string($link, $_REQUEST['srupee']);
	$description = mysqli_real_escape_string($link, $_REQUEST['description']);
	$cash = mysqli_real_escape_string($link, $_REQUEST['cash']);
	$chq = mysqli_real_escape_string($link, $_REQUEST['chq']);
	$bank = mysqli_real_escape_string($link, $_REQUEST['bank']);
	$branch = mysqli_real_escape_string($link, $_REQUEST['branch']);
	
	$method = $cash ."   ". $chq ."   ". $bank ."   ". $branch;

// attempt insert query execution
	$sql = "INSERT INTO studentreceipt (Receipt_No, Student_Name, Student_Id, Course_Name, Address, Date, Amount, Rupees, Description, Method) 
			values('$reno', '$sname', '$sid', '$cname', '$saddress', '$sdate', '$samount', '$srupee', '$description', '$method')";
	if(mysqli_query($link, $sql))
	{
		echo "<script>
				alert('***** Data Submited Successfully *****');
				window.location.href='printreceipt.php';
			</script>";
	}
	else
	{
		echo"ERROR: Could not be able to execute";
	}

//close connection
	mysqli_close($link);
 
?>