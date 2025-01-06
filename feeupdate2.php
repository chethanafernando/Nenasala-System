<?php
$link = mysqli_connect("localhost", "root", "", "nenasala_database");
 
if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}	

	$fid = mysqli_real_escape_string($link, $_REQUEST['fid']);
	$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
	$fee = mysqli_real_escape_string($link, $_REQUEST['fee']);
	$regfee = mysqli_real_escape_string($link, $_REQUEST['regfee']);
	$finstall = mysqli_real_escape_string($link, $_REQUEST['finstall']);
	$fdis = mysqli_real_escape_string($link, $_REQUEST['fdis']);

	$sql = "UPDATE fee SET Course_Name='$fname', Fee='$fee', Registration_Fee='$regfee', Installments='$finstall ', Discount='$fdis' WHERE Fee_Id='$fid'"; 
			
	if(mysqli_query($link, $sql))
	{
	echo "<script>
			alert('***** Data Updated Successfully ***** ');
			window.location.href='fee.php';
          </script>";
	
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	mysqli_close($link);
?>