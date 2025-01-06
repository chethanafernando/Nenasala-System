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
				$sql = "SELECT * FROM exam WHERE Exam_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$exid=$row["Exam_Id"];
					$exname=$row["Name"];
					$excname=$row["Course_Name"];
					$exsubjects=$row["Subject"];
					$extype=$row["Test_Type"];
					$exvenue=$row["Venue"];
					$exdate=$row["Date"];
					$extime=$row["Time"];
					$exduration=$row["Duration"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='exam.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='examupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Exam_ID</td>
												<td>::</td>
												<td><input type="text" name="exid" id="exid" class='form-control' value="<?php echo $exid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Name</td>
												<td>::</td>
												<td><input type="text" name="exname" id="exname" class='form-control' value="<?php echo $exname; ?>"></td>
											</tr>
											<tr>
												<td>Course Name</td>
												<td>::</td>
												<td><input type="text" name="excname" id="excname" class='form-control' value="<?php echo $excname; ?>"></td>
											</tr>
											<tr>
												<td>Subject</td>
												<td>::</td>
												<td><input type="text" name="exsubjects" id="exsubjects"  class='form-control' value="<?php echo $exsubjects; ?>"></td>
											</tr>
											<tr>
												<td>Test Type</td>
												<td>::</td>
												<td><input type="text" name="extype" id="extype"   class='form-control' value="<?php echo $extype; ?>"></td>
											</tr>
											<tr>
												<td>Venue</td>
												<td>::</td>
												<td><input type="text" name="exvenue" id="exvenue" class='form-control' value="<?php echo $exvenue; ?>"></td>
											</tr>
											<tr>
												<td>Date</td>
												<td>::</td>
												<td><input type="text" name="exdate" id="exdate" class='form-control'  value="<?php echo $exdate; ?>"></td>
											</tr>
											<tr>
												<td>Time</td>
												<td>::</td>
												<td><input type="text" name="extime" id="extime"  class='form-control' value="<?php echo $extime; ?>"></td>
											</tr>
											<tr>
												<td>Duration</td>
												<td>::</td>
												<td><input type="text" name="exduration" id="exduration" class='form-control'  value="<?php echo $exduration; ?>"></td>
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