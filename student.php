<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		
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
	
<!--/////////////////////////////////////////////////////Get Table data to the Excel//////////////////////////////////////////////////////////////////////////////-->	
<?php
	////////Method ONE
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nenasala_database";

	/*$conn = new mysqli($servername, $username, $password, $dbname);
	
	$sql = "SELECT * FROM student";
	
	$result = $conn->query($sql);
	
	if(isset($_POST["export"]))
	{
		$filename = "Student.xls";
		header("Content-Type:application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$isPrintHeader = false;
		if(! empty($result))
		{
			foreach($result as $row)
			{
				if(! $isPrintHeader)
				{
					echo implode("&nbsp;&nbsp;&nbsp;&nbsp;", array_keys($row)) ."<br>";
					$isPrintHeader = true;
				}
				echo implode("&nbsp;&nbsp;&nbsp;&nbsp;", array_values($row)) . "<br>";
			}
		}
		exit();
	}*/
	//////Method TWO
	$conn = mysqli_connect("localhost","root","","nenasala_database");
	$output = '';
	if(isset($_POST["export"]))
	{
		$sql = "SELECT * FROM student ORDER BY Student_Id ASC";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .= '
				<table class="table" bordered="1">
				<tr>
					<th>StudentID</th>
					<th>Name</th>
					<th>NIC</th>
					<th>DateofBirth</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Course</th>
					<th>Reg_Date</th>
				</tr>
				'
				;
				while($row = mysqli_fetch_array($result))
				{
					$output .= '
								
				<tr>
					<td>'.$row["Student_Id"].'</td>
					<td>'.$row["Name"].'</td>
					<td>'.$row["Nic"].'</td>
					<td>'.$row["Dob"].'</td>
					<td>'.$row["Gender"].'</td>
					<td>'.$row["Address"].'</td>
					<td>'.$row["Contact"].'</td>
					<td>'.$row["Email"].'</td>
					<td>'.$row["Course"].'</td>
					<td>'.$row["Reg_Date"].'</td>
				</tr>
								
								
					';
				}
				$output .= '</table>';
				header("Content-Type: application/xls");
				header("Content-Disposition: attachment; filename=student.xls");
				echo $output;
		}
	}
?>
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
		
	$sql = "SELECT * FROM student";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
		<h1>STUDENT</h1>
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>STUDENT DETAILS</h2>
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
											<th>StudentID</th>
											<th>Name</th>
											<th>NIC</th>
											<th>DateofBirth</th>
											<th>Gender</th>
											<th>Address</th>
											<th>Contact</th>
											<th>Email</th>
											<th>Course</th>
											<th>Reg_Date</th>
										</tr>
									</thead>
		" ;
		
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
		
				echo " 
					<tbody  id='myTable'>
						<tr>
							<td>$ssid</td>
							<td>$sname</td>
							<td>$snic</td>
							<td>$sdob</td>
							<td>$sgender</td>
							<td>$saddress</td>
							<td>$scontact</td>
							<td>$semail</td>
							<td>$scourse</td>
							<td>$sregdate</td>
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
									<form action='stucode.php' method='post'>
										<table border='0'cellpadding='10' cellspacing='10' align='center' id='tbl1'>	
											<div class='form-group'>
												<tr>
													<td><label>StudentID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter New ID' name='sid' id='sid' size='100' required></td>
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
													<td><label>Course</label></td>
													<td align='left'>
														<table border='0'>
															<tr>
																<td><input type='checkbox' name='chk1' id='chk1' value='Diploma in Information Communication Technology'>&nbsp;&nbsp;Diploma in Information Communication Technology</td>
																<td><input type='checkbox' name='chk2' id='chk2' value='Certificate in Computer Application'>&nbsp;&nbsp;Certificate in Computer Application</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk3' id='chk3' value='Diploma in Web Engineering'>&nbsp;&nbsp;Diploma in Web Engineering</td>
																<td><input type='checkbox' name='chk4' id='chk4' value='Certificate in Graphic Designing'>&nbsp;&nbsp;Certificate in Graphic Designing</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk5' id='chk5' value='Diploma in Software Engineering'>&nbsp;&nbsp;Diploma in Software Engineering</td>
																<td><input type='checkbox' name='chk6' id='chk6' value='Certificate in AutoCAD'>&nbsp;&nbsp;Certificate in AutoCAD</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk7' id='chk7' value='Diploma in Graphic Designing'>&nbsp;&nbsp;Diploma in Graphic Designing</td>
																<td><input type='checkbox' name='chk8' id='chk8' value='Certificate in English'>&nbsp;&nbsp;Certificate in English</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk9' id='chk9' value='Diploma in AutoCAD'>&nbsp;&nbsp;Diploma in AutoCAD</td>
																<td><input type='checkbox' name='chk10' id='chk10' value='Certificate in Computer Hardware'>&nbsp;&nbsp;Certificate in Computer Hardware</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk11' id='chk11' value='Diploma in English'>&nbsp;&nbsp;Diploma in English</td>
																<td><input type='checkbox' name='chk12' id='chk12' value='Certificate in Web Development'>&nbsp;&nbsp;Certificate in Web Development</td>
															</tr>
															<tr>
																<td><input type='checkbox' name='chk13' id='chk13' value='Diploma in Networking'>&nbsp;&nbsp;Diploma in Networking</td>
																<td><input type='checkbox' name='chk14' id='chk14' value='N-Kid course'>&nbsp;&nbsp;N-Kid course</td>
															</tr>
														</table>
													</td>
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
												<th>Address</th>
												<th>Contact</th>
												<th>Email</th>
												<th>Course</th>
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
	
	$sql = mysqli_query($conn,"SELECT * FROM student");
	
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
											<td><?php echo $row['Student_Id'];?></td>
											<td><?php echo $row['Name'];?></td>
											<td><?php echo $row['Nic'];?></td>
											<td><?php echo $row['Dob'];?></td>
											<td><?php echo $row['Gender'];?></td>
											<td><?php echo $row['Address'];?></td>
											<td><?php echo $row['Contact'];?></td>
											<td><?php echo $row['Email'];?></td>
											<td><?php echo $row['Course'];?></td>
											<td><?php echo $row['Reg_Date'];?></td>
											<td colspan='10' align='center'><a href='stupdate.php?i=<?php echo $row['Student_Id']; ?>' class='btn btn-primary' >Update</a></td>
											<td colspan='10' align='center'><a href='studelete.php?i=<?php echo $row['Student_Id']; ?>'  class='btn btn-warning' >Delete</a></td>	
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