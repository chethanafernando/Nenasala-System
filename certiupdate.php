<!DOCTYPE html>
<html>
	<title>Changing Form</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='js/bootstrap.min.js'>
	<link rel='stylesheet' href='updatestyle.css'>
	<style type='text/css'>
		body
			{
				background-color:red;
			}
	</style>
<body>
			<?php
			
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "nenasala_database";
				$id = $_GET['i'];

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if ($conn->connect_error) 
					{
						die("Connection Failed: " . $conn->connect_error);
					} 
				$sql = "SELECT * FROM certificate WHERE Certificate_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$ceid=$row["Certificate_Id"];
					$ceno=$row["Certificate_No"];
					$cesid=$row["Student_Id"];
					$cecid=$row["Course_Id"];
					$ceissue=$row["Issued"];
					$ceissdate=$row["Issued_Date"];
				}
				} 
				else 
				{
					echo "<center><br><br>No Data Found !!!<center>";
				}
				$conn->close();
			?>
			<div class='container-fluid'>
				<div class="block-header"><br>
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='certificate.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='certiupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Certificate ID</td>
												<td>::</td>
												<td><input type="text" name="ceid" id="ceid" class='form-control' value="<?php echo $ceid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Certificate Number</td>
												<td>::</td>
												<td><input type="text" name="ceno" id="ceno" class='form-control' value="<?php echo $ceno; ?>"></td>
											</tr>
											<tr>
												<td>Student ID</td>
												<td>::</td>
												<td><input type="text" name="cesid" id="cesid" class='form-control' value="<?php echo $cesid; ?>"></td>
											</tr>
											<tr>
												<td>Course ID</td>
												<td>::</td>
												<td><input type="text" name="cecid" id="cecid"  class='form-control' value="<?php echo $cecid; ?>"></td>
											</tr>
											<tr>
												<td>Issued</td>
												<td>::</td>
												<td><input type="text" name="issued" id="issued"   class='form-control' value="<?php echo $ceissue; ?>"></td>
											</tr>
											<tr>
												<td>Issued Date</td>
												<td>::</td>
												<td><input type="text" name="issuedate" id="issuedate" class='form-control' value="<?php echo $ceissdate; ?>"></td>
											</tr>
										</table>
									<button class='btn btn-warning'>Update</button>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>