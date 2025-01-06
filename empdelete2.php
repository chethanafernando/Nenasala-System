<?php

$id = $_GET['i'];

//echo $id;

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

mysqli_query($link, "delete from employee where Employee_id='$id'");

	echo "<script>
			alert('***** Data Deleted Successfully *****');
			window.location.href='employee.php';
		</script>";
?>