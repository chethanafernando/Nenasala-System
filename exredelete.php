<!DOCTYPE html>
<html>
	<title>Deleting Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="deletestyle.css">
<body>
	<div id='modal-wrapper' class='modal'>
		<span onclick="document.getElementById('modal-wrapper').style.dispaly='none'" class='close' title='Close PopUp'>&times;</span>
			<div class="container">
				<?php
					$id = $_GET['i'];
				?>
				<center>
					<h1><a href='repeatdatabase.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Delete Record</h1>
						<form class='modal-content animate' action='exredelete2.php'><br>
							<table border='0' >
								<tr>
									<td>Do you want to delete  <?php echo $id; ?> ???</td>
								</tr>
							</table>
							<br>
							<br>
							<table border='0'>
								<tr>
									<td><a href='exredelete2.php?i=<?php echo $id; ?>'>Delete</a></td>
								</tr>
							</table>
						</form>
				</center>
			</div>
</body>
</html>