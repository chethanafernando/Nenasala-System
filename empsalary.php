<!DOCTYPE html>
<html>
	<head>
		<title>Employee Salary</title>
		
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
		
	$sql = "SELECT * FROM employeesalary";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
		<h1>EMPLOYEE SALARY</h1>
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>SALARY DETAILS</h2>
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
													<button type='submit' id='btnExport' name='export' value='Export to Excel' class='btn btn-primary'>Export</button>
												</form>
											</td>
											<td><a href='createempslip.php'  id='slip' name='slip' class='btn btn-primary'>Slip</a></td>
										</tr>
									</table>
								</div>
							</div>
						<div id='printableTable'>
							<div class='d-flex justify-content-center'>
								<table class='table table-dark table-striped table-condensed'></div>
									<thead>
										<tr>
											<th>EMP Salary ID</th>
											<th>Employee_Id</th>
											<th>Salary</th>
											<th>Month</th>
											<th>Date</th>
											<th>Account Number</th>
											<th>Credited</th>
										</tr>
									</thead>
		" ;
		
		while($row = $result->fetch_assoc())
			{
				$esid=$row["EmpSalary_Id"];
				$esempid=$row["Employee_Id"];
				$essalary=$row["Salary"];
				$esmonth=$row["Month"];
				$esdate=$row["Date"];
				$esaccno=$row["Account_Number"];
				$escredited=$row["Credited"];
		
				echo " 
					<tbody  id='myTable'>
						<tr>
							<td>$esid</td>
							<td>$esempid</td>
							<td>$essalary</td>
							<td>$esmonth</td>
							<td>$esdate</td>
							<td>$esaccno</td>
							<td>$escredited</td>
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
									<form action='empsalarycode.php' method='post'>
										<table border='0'cellpadding='10' cellspacing='10' align='center' id='tbl1'>	
											<div class='form-group'>
												<tr>
													<td><label>EmpSalaryID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter New ID' name='esid' id='esid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>EmployeeID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Employee ID' name='esempid' id='esempid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Salary</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Salary' name='essalary' id='essalary' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Month</label></td>
													<td>
														<select id='month' name='month' class='form-control'>
															<option value='January'>January</option>
															<option value='February'>February</option>
															<option value='March'>March</option>
															<option value='April'>April</option>
															<option value='May'>May</option>
															<option value='June'>June</option>
															<option value='July'>July</option>
															<option value='August'>August</option>
															<option value='September'>September</option>
															<option value='October'>October</option>
															<option value='November'>November</option>
															<option value='December'>December</option>
														</select>
													</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Date</label></td>
													<td><input type='date' class='form-control' name='date' id='date' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Account Number</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Bank Account Number' name='accno' id='accno' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Credited</label></td>
													<td align='left'>
														<input type='radio' name='credit1' id='credit1' value='Yes' checked>&nbsp;&nbsp;Yes
														<input type='radio' name='credit1' id='credit1' value='No'>&nbsp;&nbsp;No
													</td>
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
									<table class='table table-dark table-striped table-condensed'></div>
										<thead>
											<tr>
												<th>EMP Salary ID</th>
												<th>Employee_Id</th>
												<th>Salary</th>
												<th>Month</th>
												<th>Date</th>
												<th>Account Number</th>
												<th>Credited</th>
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
	
	$sql = mysqli_query($conn,"SELECT * FROM employeesalary");
	
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
											<td><?php echo $row['EmpSalary_Id'];?></td>
											<td><?php echo $row['Employee_Id'];?></td>
											<td><?php echo $row['Salary'];?></td>
											<td><?php echo $row['Month'];?></td>
											<td><?php echo $row['Date'];?></td>
											<td><?php echo $row['Account_Number'];?></td>
											<td><?php echo $row['Credited'];?></td>
											<td colspan='10' align='center'><a href='empsalaryupdate.php?i=<?php echo $row['EmpSalary_Id']; ?>' class='btn btn-primary' >Update</a></td>
											<td colspan='10' align='center'><a href='empsalarydelete.php?i=<?php echo $row['EmpSalary_Id']; ?>'  class='btn btn-warning' >Delete</a></td>	
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