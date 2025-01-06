<!DOCTYPE html>
<html>
	<title>Changing Form</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='js/bootstrap.min.js'>
	<link rel='stylesheet' href='updatestyle.css'>
	<style type='text/css'>
			
	#role
	{
		width:70%;
		height:50%;
		padding:12px 20px;
		margin:8px 26px;
		display:inline-block;
		border:1px solid #ccc;
		font-size:15px;
		border-radius: 25px;
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
				$sql = "SELECT * FROM employee WHERE Employee_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$empid=$row["Employee_Id"];
					$empname=$row["Name"];
					$empnic=$row["Nic"];
					$empdob=$row["Dob"];
					$empgender=$row["Gender"];
					$role=$row["Role"];
					$empaddress=$row["Address"];
					$empcontact=$row["Contact"];
					$empemail=$row["Email"];
					$empquali=$row["Qualification"];
					$empsalary=$row["Salary"];
					$empregdate=$row["Reg_Date"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='employee.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='empupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Employee_ID</td>
												<td>::</td>
												<td><input type="text" name="id" id="id" class='form-control' value="<?php echo $empid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Name</td>
												<td>::</td>
												<td><input type="text" name="name" id="name" class='form-control' value="<?php echo $empname; ?>"></td>
											</tr>
											<tr>
												<td>Nic</td>
												<td>::</td>
												<td><input type="text" name="nic" id="nic" class='form-control' value="<?php echo $empnic; ?>"></td>
											</tr>
											<tr>
												<td>Date of Birth</td>
												<td>::</td>
												<td><input type="text" name="dob" id="dob"  class='form-control' value="<?php echo $empdob; ?>"></td>
											</tr>
											<tr>
												<td>Gender</td>
												<td>::</td>
												<td><input type="text" name="gender" id="gender"   class='form-control' value="<?php echo $empgender; ?>"></td>
											</tr>
											<tr>
												<td>Role</td>
												<td>::</td>
												<td>
													<select id='role' name='role' class='form-control'>
															<option value='<?php echo $role; ?>'><?php echo $role; ?></option>
															<option value='Administrator'>Administrator</option>
															<option value='Supervisor'>Supervisor</option>
														</select>
											</tr>
											<tr>
												<td>Address</td>
												<td>::</td>
												<td><input type="text" name="address" id="address" class='form-control' value="<?php echo $empaddress; ?>"></td>
											</tr>
											<tr>
												<td>Contact</td>
												<td>::</td>
												<td><input type="text" name="contact" id="contact" class='form-control'  value="<?php echo $empcontact; ?>"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td>::</td>
												<td><input type="text" name="email" id="email"  class='form-control' value="<?php echo $empemail; ?>"></td>
											</tr>
											<tr>
												<td>Qualifications</td>
												<td>::</td>
												<td><input type="text" name="quali" id="quali"  class='form-control'  value="<?php echo $empquali; ?>"></td>
											</tr>
											<tr>
												<td>Salary</td>
												<td>::</td>
												<td><input type="text" name="salary" id="salary"  class='form-control' value="<?php echo $empsalary; ?>"></td>
											</tr>
											<tr>
												<td>Reg_Date</td>
												<td>::</td>
												<td><input type="text" name="regdate" id="regdate" class='form-control'  value="<?php echo $empregdate; ?>"></td>
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