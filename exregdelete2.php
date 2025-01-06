<?php

$id = $_GET['i'];

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

mysqli_query($link, "delete from registerexam where Exam_Id='$id'");

	echo "<script>
			alert('***** Data Deleted Successfully *****');
			window.location.href='examregdatabase.php';
		</script>";
?>