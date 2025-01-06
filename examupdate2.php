<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$exid = mysqli_real_escape_string($link, $_REQUEST['exid']);
	$exname = mysqli_real_escape_string($link, $_REQUEST['exname']);
	$excname= mysqli_real_escape_string($link, $_REQUEST['excname']);
	$exsubjects = mysqli_real_escape_string($link, $_REQUEST['exsubjects']);
	$extype = mysqli_real_escape_string($link, $_REQUEST['extype']);
	$exvenue = mysqli_real_escape_string($link, $_REQUEST['exvenue']);
	$exdate = mysqli_real_escape_string($link, $_REQUEST['exdate']);
	$extime = mysqli_real_escape_string($link, $_REQUEST['extime']);
	$exduration = mysqli_real_escape_string($link, $_REQUEST['exduration']);
	$regdate = mysqli_real_escape_string($link, $_REQUEST['regdate']);

	$sql = "UPDATE exam SET Name='$exname', Course_Name='$excname', Subject='$exsubjects', Test_Type='$extype', Venue='$exvenue', Date='$exdate', Time='$extime', Duration='$exduration'  WHERE Exam_Id='$exid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='exam.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>