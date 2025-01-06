<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$ceid = mysqli_real_escape_string($link, $_REQUEST['ceid']);
	$ceno = mysqli_real_escape_string($link, $_REQUEST['ceno']);
	$cesid = mysqli_real_escape_string($link, $_REQUEST['cesid']);
	$cecid = mysqli_real_escape_string($link, $_REQUEST['cecid']);
	$issued = mysqli_real_escape_string($link, $_REQUEST['issued']);
	$issuedate = mysqli_real_escape_string($link, $_REQUEST['issuedate']);

	$sql = "UPDATE certificate SET Certificate_No='$ceno', Student_Id='$cesid', Course_Id='$cecid', Issued='$issued', Issued_Date='$issuedate' WHERE Certificate_Id='$ceid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='certificate.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>