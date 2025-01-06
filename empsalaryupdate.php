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
				$sql = "SELECT * FROM employeesalary WHERE EmpSalary_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$esid=$row["EmpSalary_Id"];
					$esempid=$row["Employee_Id"];
					$essalary=$row["Salary"];
					$esmonth=$row["Month"];
					$esdate=$row["Date"];
					$esaccno=$row["Account_Number"];
					$escredited=$row["Credited"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='empsalary.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='empsalaryupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>EMP Salary ID</td>
												<td>::</td>
												<td><input type="text" name="empid" id="empid" class='form-control' value="<?php echo $esid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Employee ID</td>
												<td>::</td>
												<td><input type="text" name="esempid" id="esempid" class='form-control' value="<?php echo $esempid; ?>"></td>
											</tr>
											<tr>
												<td>Salary</td>
												<td>::</td>
												<td><input type="text" name="essalary" id="essalary" class='form-control' value="<?php echo $essalary; ?>"></td>
											</tr>
											<tr>
												<td>Month</td>
												<td>::</td>
												<td><input type="text" name="esmonth" id="esmonth"  class='form-control' value="<?php echo $esmonth; ?>"></td>
											</tr>
											<tr>
												<td>Date</td>
												<td>::</td>
												<td><input type="text" name="esdate" id="esdate"   class='form-control' value="<?php echo $esdate; ?>"></td>
											</tr>
											<tr>
												<td>Account Number</td>
												<td>::</td>
												<td><input type="text" name="esaccno" id="esaccno" class='form-control' value="<?php echo $esaccno; ?>"></td>
											</tr>
											<tr>
												<td>Credited</td>
												<td>::</td>
												<td><input type="text" name="escredited" id="escredited" class='form-control'  value="<?php echo $escredited; ?>"></td>
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