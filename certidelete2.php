<?php

$id = $_GET['i'];

$link = mysqli_connect("localhost", "root", "", "nenasala_database");

mysqli_query($link, "delete from certificate where Certificate_Id='$id'");

	echo "<script>
			alert('***** Data Deleted Successfully *****');
			window.location.href='certificate.php';
		</script>";
?>