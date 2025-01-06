<!DOCTYPE html>
<html>
	<head>
		<title>Employee</title>
		
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<link rel='stylesheet' href='css/bootstrap.min.css'>
			<link rel='stylesheet' href='js/bootstrap.min.js'>
			<link rel='stylesheet' href='backgroundstyle.css'>
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script>
				$(document).ready(function()
				{
					$("#myInput").on("keyup", function() 
						{
							var value = $(this).val().toLowerCase();
								$("#myTable tr").filter(function() 
									{
										$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
									});
						});
				});
			</script>
			<script>
				$(document).ready(function()
				{
					$("#myInput1").on("keyup", function() 
						{
							var value = $(this).val().toLowerCase();
								$("#myTable1 tr").filter(function() 
									{
										$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
									});
						});
				});
			</script>
			<script>
				 function printDiv() 
					{
						window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
						window.frames["print_frame"].window.focus();
						window.frames["print_frame"].window.print();
					}
			</script>
	</head>
	<body background='Images/Background3.jpeg'>
<!--////////////////////////////////////////////////////Export Data to the Excel///////////////////////////////////////////////////////////////////////////-->	

<!--/////////////////////////////////////////////////////PHP begining for View Details of a Student/////////////////////////////////////////////////-->	
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nenasala_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//check connection
	if($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	$sql = "SELECT * FROM employee";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
		<h1>EMPLOYEE</h1>
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>EMPLOYEE DETAILS</h2>
							<div class='container'>
								<div class='table-responsive'>
									<table border='0' align='center' cellspacing='10' cellpadding='10'>
										<tr>
											<td><a href='home.php' id='style' class='btn btn-dark'>Home</a></td>
											<td><a href='#View'  id='style' class='btn btn-dark'>View</a></td>
											<td><a href='#Add'  id='style' class='btn btn-dark'>Add</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Update</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Delete</a></td>
											<td>
												<input type='text' placeholder='Search.....' name='myInput' class='form-control' id='myInput'>
											</td>
											<td><button class='btn btn-primary' onclick='printDiv()'>Print</button></td>
											<td>
												<form action='' method='post'>
													<button type='submit' id='btnExport' name='export' value='Export to Excel' class='btn btn-primary'>Export to Excel</button>
												</form>
											</td>
										</tr>
									</table>
								</div>
							</div>
						<div id='printableTable'>
							<div class='d-flex justify-content-center'>
								<table class='table table-dark table-striped table-condensed'></div>
									<thead>
										<tr>
											<th>EmployeeID</th>
											<th>Name</th>
											<th>NIC</th>
											<th>Date of Birth</th>
											<th>Gender</th>
											<th>Role</th>
											<th>Address</th>
											<th>Contact</th>
											<th>Email</th>
											<th>Qualifications</th>
											<th>Salary</th>
											<th>Reg_Date</th>
										</tr>
									</thead>
		" ;
		
		while($row = $result->fetch_assoc())
			{
				$empid=$row["Employee_Id"];
				$empname=$row["Name"];
				$empnic=$row["Nic"];
				$empdob=$row["Dob"];
				$empgender=$row["Gender"];
				$erole=$row["Role"];
				$empaddress=$row["Address"];
				$empcontact=$row["Contact"];
				$empemail=$row["Email"];
				$empquali=$row["Qualification"];
				$empsalary=$row["Salary"];
				$empregdate=$row["Reg_Date"];
		
				echo " 
					<tbody  id='myTable'>
						<tr>
							<td>$empid</td>
							<td>$empname</td>
							<td>$empnic</td>
							<td>$empdob</td>
							<td>$empgender</td>
							<td>$erole</td>
							<td>$empaddress</td>
							<td>$empcontact</td>
							<td>$empemail</td>
							<td>$empquali</td>
							<td>$empsalary</td>
							<td>$empregdate</td>
						</tr>
					</tbody>
					" ;
			} 
				echo "
							</table>
						</div>
						<iframe name='print_frame' width='0' height='0' frameborder='0' src='about:blank'></iframe>
					</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class='card'>
							<div class='container'>
								<h2 id='Add'>ADD RECORD</h2>
								<div class='container'>
								<div class='table-responsive'>
									<table border='0' align='center' cellspacing='10' cellpadding='10'>
										<tr>
											<td><a href='home.php' id='style' class='btn btn-dark'>Home</a></td>
											<td><a href='#View'  id='style' class='btn btn-dark'>View</a></td>
											<td><a href='#Add'  id='style' class='btn btn-dark'>Add</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Update</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Delete</a></td>
										</tr>
									</table>
								</div>
							</div>
									<form action='empcode.php' method='post'>
										<table border='0'cellpadding='10' cellspacing='10' align='center' id='tbl1'>	
											<div class='form-group'>
												<tr>
													<td><label>EmployeeID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter New ID' name='empid' id='empid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Name</label></td>
													<td><input type='text' class='form-control' placeholder='Enter your Name' name='name' id='name' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>NIC</label></td>
													<td><input type='text' class='form-control' placeholder='Enter your Identity Card Number' name='nic' id='nic' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Date of Birth</label></td>
													<td><input type='date' class='form-control' placeholder='Enter your birthday' name='dob' id='dob' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Gender</label></td>
													<td align='left'><input type='radio' name='gen' id='gen' value='Male'>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type='radio' name='gen' id='gen' value='Female'>&nbsp;&nbsp;Female</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Role</label></td>
													<td>
														<select id='role' name='role' class='form-control'>
															<option value='Administrator'>Administrator</option>
															<option value='Supervisor'>Supervisor</option>
														</select>
													</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Address</label></td>
													<td><input type='text' class='form-control' placeholder='Enter your address' name='address' id='address' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Contact</label></td>
													<td><input type='text' class='form-control' placeholder='Enter your phone number' name='contact' id='contact' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Email</label></td>
													<td><input type='email' class='form-control' placeholder='Enter your email' name='email' id='email' size='100'></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Qualifications</label></td>
													<td><textarea class='form-control' placeholder='Enter your qualifications using slash(/)' name='quali' id='quali' size='300'></textarea></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Salary</label></td>
													<td><input type='text' class='form-control' placeholder='Enter your salary eg:Rs.200000.00' name='salary' id='salary' size='100'></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Reg_Date</label></td>
													<td><input type='date' class='form-control' name='regdate' id='regdate' size='100' required></td>
												</tr>
											</div>
												<tr>
												<td colspan='10' align='center'><button type='submit' class='btn btn-primary'>Submit</button>&nbsp;&nbsp;&nbsp;
												<button type='reset' value='Clear' class='btn btn-primary'>Clear</button></td>
												</tr>
										</table>
									</form>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div  class='card'>
							<h2 id='Upadate/Delete'>UPDATE / DELETE RECORD</h2>
							<div class='container'>
								<div class='table-responsive'>
									<table border='0' align='center' cellspacing='10' cellpadding='10'>
										<tr>
											<td><a href='home.php' id='style' class='btn btn-dark'>Home</a></td>
											<td><a href='#View'  id='style' class='btn btn-dark'>View</a></td>
											<td><a href='#Add'  id='style' class='btn btn-dark'>Add</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Update</a></td>
											<td><a href='#Upadate/Delete'  id='style' class='btn btn-dark'>Delete</a></td>
											<td>
												<input type='text' placeholder='Search.....' name='myInput1' class='form-control' id='myInput1'>
											</td>
										</tr>
									</table>
								</div>
							</div>
								<div class='d-flex justify-content-center'>
									<table class='table table-dark table-striped table-responsive table-condensed'>
										<thead>
											<tr>
												<th>StudentID</th>
												<th>Name</th>
												<th>NIC</th>
												<th>DateofBirth</th>
												<th>Gender</th>
												<th>Role</th>
												<th>Address</th>
												<th>Contact</th>
												<th>Email</th>
												<th>Course</th>
												<th>Salary</th>
												<th>Reg_Date</th>
												<th>Operations</th>
											</tr>
										</thead>
								</div>
					" ;
		} 
?>
<?php							

//PHP for Updating and Deleting a data in a Database///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nenasala_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$sql = mysqli_query($conn,"SELECT * FROM employee");
	
	while($row = mysqli_fetch_array($sql))
		{
	
?>
	<script type='text/javascript'>
	var modal = document.getElementById('modal-wrapper');
		{
			if(event.target == modal)
			{
				modal.style.display = 'none';
			}
		}
	</script>
		
									<tbody id='myTable1'>
										<tr>
											<td><?php echo $row['Employee_Id'];?></td>
											<td><?php echo $row['Name'];?></td>
											<td><?php echo $row['Nic'];?></td>
											<td><?php echo $row['Dob'];?></td>
											<td><?php echo $row['Gender'];?></td>
											<td><?php echo $row['Role'];?></td>
											<td><?php echo $row['Address'];?></td>
											<td><?php echo $row['Contact'];?></td>
											<td><?php echo $row['Email'];?></td>
											<td><?php echo $row['Qualification'];?></td>
											<td><?php echo $row['Salary'];?></td>
											<td><?php echo $row['Reg_Date'];?></td>
											<td colspan='10' align='center'><a href='empupdate.php?i=<?php echo $row['Employee_Id']; ?>' class='btn btn-primary' >Update</a></td>
											<td colspan='10' align='center'><a href='empdelete.php?i=<?php echo $row['Employee_Id']; ?>'  class='btn btn-warning' >Delete</a></td>	
										</tr>
									</tbody>
<?php
		}
?>
							</table>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>