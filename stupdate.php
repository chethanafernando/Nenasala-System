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
				$sql = "SELECT * FROM student WHERE Student_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$ssid=$row["Student_Id"];
					$sname=$row["Name"];
					$snic=$row["Nic"];
					$sdob=$row["Dob"];
					$sgender=$row["Gender"];
					$saddress=$row["Address"];
					$scontact=$row["Contact"];
					$semail=$row["Email"];
					$scourse=$row["Course"];
					$sregdate=$row["Reg_Date"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='student.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='stupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Student_ID</td>
												<td>::</td>
												<td><input type="text" name="id" id="id" class='form-control' value="<?php echo $ssid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Name</td>
												<td>::</td>
												<td><input type="text" name="name" id="name" class='form-control' value="<?php echo $sname; ?>"></td>
											</tr>
											<tr>
												<td>Nic</td>
												<td>::</td>
												<td><input type="text" name="nic" id="nic" class='form-control' value="<?php echo $snic; ?>"></td>
											</tr>
											<tr>
												<td>Date of Birth</td>
												<td>::</td>
												<td><input type="text" name="dob" id="dob"  class='form-control' value="<?php echo $sdob; ?>"></td>
											</tr>
											<tr>
												<td>Gender</td>
												<td>::</td>
												<td><input type="text" name="gender" id="gender"   class='form-control' value="<?php echo $sgender; ?>"></td>
											</tr>
											<tr>
												<td>Address</td>
												<td>::</td>
												<td><input type="text" name="address" id="address" class='form-control' value="<?php echo $saddress; ?>"></td>
											</tr>
											<tr>
												<td>Contact</td>
												<td>::</td>
												<td><input type="text" name="contact" id="contact" class='form-control'  value="<?php echo $scontact; ?>"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td>::</td>
												<td><input type="text" name="email" id="email"  class='form-control' value="<?php echo $semail; ?>"></td>
											</tr>
											<tr>
												<td>Course</td>
												<td>::</td>
												<td><input type="text" name="course" id="course" class='form-control'  value="<?php echo $scourse; ?>"></td>
											</tr>
											<tr>
												<td>Reg_Date</td>
												<td>::</td>
												<td><input type="text" name="regdate" id="regdate" class='form-control'  value="<?php echo $sregdate; ?>"></td>
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