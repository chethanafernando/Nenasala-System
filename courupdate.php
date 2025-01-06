<!DOCTYPE html>
<html>
	<title>Changing Form</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='js/bootstrap.min.js'>
	<link rel='stylesheet' href='updatestyle.css'>
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
				$sql = "SELECT * FROM course WHERE Course_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$cid=$row["Course_Id"];
					$cname=$row["Name"];
					$cfee=$row["Fee"];
					$ctype=$row["Course_Type"];
					$cduration=$row["Duration"];
					$cvenue=$row["Venue"];
					$cday=$row["Day"];
					$ctime=$row["Time"];
					$cstdate=$row["Start_Date"];
					$ceddate=$row["End_Date"];
					$csubjects=$row["Subjects"];
					$coverview=$row["Overview"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='course.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='courupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Course ID</td>
												<td>::</td>
												<td><input type="text" name="cid" id="cid" class='form-control' value="<?php echo $cid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Name</td>
												<td>::</td>
												<td><input type="text" name="cname" id="cname" class='form-control' value="<?php echo $cname; ?>"></td>
											</tr>
											<tr>
												<td>Fee</td>
												<td>::</td>
												<td><input type="text" name="cfee" id="cfee" class='form-control' value="<?php echo $cfee; ?>"></td>
											</tr>
											<tr>
												<td>Course Type</td>
												<td>::</td>
												<td><input type="text" name="ctype" id="ctype"  class='form-control' value="<?php echo $ctype; ?>"></td>
											</tr>
											<tr>
												<td>Duration</td>
												<td>::</td>
												<td><input type="text" name="cduration" id="cduration"   class='form-control' value="<?php echo $cduration; ?>"></td>
											</tr>
											<tr>
												<td>Venue</td>
												<td>::</td>
												<td><input type="text" name="venue" id="venue" class='form-control' value="<?php echo $cvenue; ?>"></td>
											</tr>
											<tr>
												<td>Day</td>
												<td>::</td>
												<td><input type="text" name="cday" id="cday" class='form-control'  value="<?php echo $cday; ?>"></td>
											</tr>
											<tr>
												<td>Time</td>
												<td>::</td>
												<td><input type="text" name="ctime" id="ctime"  class='form-control' value="<?php echo $ctime; ?>"></td>
											</tr>
											<tr>
												<td>Start Date</td>
												<td>::</td>
												<td><input type="text" name="csdate" id="csdate" class='form-control'  value="<?php echo $cstdate; ?>"></td>
											</tr>
											<tr>
												<td>End Date</td>
												<td>::</td>
												<td><input type="text" name="ceddate" id="ceddate" class='form-control'  value="<?php echo $ceddate; ?>"></td>
											</tr>
											<tr>
												<td>Subjects</td>
												<td>::</td>
												<td><input type="text" name="csubjects" id="csubjects" class='form-control'  value="<?php echo $csubjects; ?>"></td>
											</tr>
											<tr>
												<td>Overview</td>
												<td>::</td>
												<td><input type="text" name="coverview" id="coverview" class='form-control'  value="<?php echo $coverview; ?>"></td>
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