<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$cid = mysqli_real_escape_string($link, $_REQUEST['cid']);
	$cname = mysqli_real_escape_string($link, $_REQUEST['cname']);
	$cfee = mysqli_real_escape_string($link, $_REQUEST['cfee']);
	$ctype = mysqli_real_escape_string($link, $_REQUEST['ctype']);
	$cduration = mysqli_real_escape_string($link, $_REQUEST['cduration']);
	$cvenue = mysqli_real_escape_string($link, $_REQUEST['venue']);
	$cday = mysqli_real_escape_string($link, $_REQUEST['cday']);
	$ctime = mysqli_real_escape_string($link, $_REQUEST['ctime']);
	$cstdate = mysqli_real_escape_string($link, $_REQUEST['csdate']);
	$ceddate = mysqli_real_escape_string($link, $_REQUEST['ceddate']);
	$csubjects = mysqli_real_escape_string($link, $_REQUEST['csubjects']);
	$coverview = mysqli_real_escape_string($link, $_REQUEST['coverview']);

	$sql = "UPDATE course SET Name='$cname', Fee='$cfee', Course_Type='$ctype', Duration='$cduration', Venue='$cvenue', Day='$cday', Time='$ctime', Start_Date='$cstdate', End_Date='$ceddate', Subjects='$csubjects', Overview='$coverview' WHERE Course_Id='$cid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='course.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>