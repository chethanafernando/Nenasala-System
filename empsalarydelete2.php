<?php

$id = $_GET['i'];

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

mysqli_query($link, "delete from employeesalary where EmpSalary_Id='$id'");

	echo "<script>
			alert('***** Data Deleted Successfully *****');
			window.location.href='empsalary.php';
		</script>";
?>