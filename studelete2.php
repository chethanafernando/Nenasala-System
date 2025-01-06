<?php

$id = $_GET['i'];

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

mysqli_query($link, "delete from student where Student_id='$id'");

	echo "<script>
			alert('***** Data Deleted Successfully *****');
			window.location.href='student.php';
		</script>";
?>