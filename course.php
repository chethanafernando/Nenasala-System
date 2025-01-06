<!DOCTYPE html>
<html>
	<head>
		<title>Course</title>
		
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

	$sql = "SELECT * FROM course";

	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
		<h1>COURSE</h1>
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>COURSE DETAILS</h2>
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
											<th>CourseID</th>
											<th>Name</th>
											<th>Fee</th>
											<th>CourseType</th>
											<th>Duration</th>
											<th>Venue</th>
											<th>Day</th>
											<th>Time</th>
											<th>StartDate</th>
											<th>EndDate</th>
											<th>Subjects</th>
											<th>Overview</th>
										</tr>
									</thead>
		" ;

		while($row = $result->fetch_assoc())
			{
				
		?>
				
					<tbody  id='myTable'>
						<tr>
							<td><?php echo $row['Course_Id'];?></td>
							<td><?php echo $row['Name'];?></td>
							<td><?php echo $row['Fee'];?></td>
							<td><?php echo $row['Course_Type'];?></td>
							<td><?php echo $row['Duration'];?></td>
							<td><?php echo $row['Venue'];?></td>
							<td><?php echo $row['Day'];?></td>
							<td><?php echo $row['Time'];?></td>
							<td><?php echo $row['Start_Date'];?></td>
							<td><?php echo $row['End_Date'];?></td>
							<td><?php echo $row['Subjects'];?></td>
							<td><?php echo $row['Overview'];?></td>
						</tr>
					</tbody>
			<?php
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
									<form action='courcode.php' method='post'>
										<table border='0'cellpadding='10' cellspacing='10' align='center' id='tbl1'>	
											<div class='form-group'>
												<tr>
													<td><label>CourseID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Course ID' name='cid' id='cid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Name</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Course Name' name='cname' id='cname' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Fee</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Course Fee eg:Rs.28000.00' name='cfee' id='cfee' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Course Type</label></td>
													<td align ='left'>
														<input type='checkbox' name='chk1' id='chk1' value='Certificate Level'>Certificate Level<br>
														<input type='checkbox' name='chk2' id='chk2' value='Diploma Level'>Diploma Level<br>
														<input type='checkbox' name='chk3' id='chk3' value='NVQ Level'>NVQ Level
													</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Duration</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Duration eg:6 Months' name='cduration' id='cduration' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Venue</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Venue eg:Class-Room-04' name='cvenue' id='cvenue' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Day</label></td>
													<td>
														<select id='cday' name='cday' size='7' class='form-control'>
															<option value='Monday'>Monday</option>
															<option value='Tuesday'>Tuesday</option>
															<option value='Wendsday'>Wendsday</option>
															<option value='Thursday'>Thursday</option>
															<option value='Friday'>Friday</option>
															<option value='Saturday'>Saturday</option>
															<option value='Sunday'>Sunday</option>
														</select>
													</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Time</label></td>
													<td><input type='time' class='form-control' name='ctime' id='ctime'></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Start Date</label></td>
													<td><input type='date' class='form-control' name='cstdate' id='cstdate' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>End Date</label></td>
													<td><input type='date' class='form-control' name='ceddate' id='ceddate' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Subjects</label></td>
													<td><textarea class='form-control' name='csubjects' id='csubjects' size='100' placeholder='Enter Subject (use slash(/) to break line)'></textarea></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Overview</label></td>
													<td><textarea class='form-control' name='coverview' id='coverview' size='100' placeholder='Enter Overview (use slash(/) to break line)'></textarea></td>
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
												<th>CourseID</th>
												<th>Name</th>
												<th>Fee</th>
												<th>CourseType</th>
												<th>Duration</th>
												<th>Venue</th>
												<th>Day</th>
												<th>Time</th>
												<th>StartDate</th>
												<th>EndDate</th>
												<th>Subjects</th>
												<th>Overview</th>
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
	
	$sql = mysqli_query($conn,"SELECT * FROM course");
	
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
											<td><?php echo $row['Course_Id'];?></td>
											<td><?php echo $row['Name'];?></td>
											<td><?php echo $row['Fee'];?></td>
											<td><?php echo $row['Course_Type'];?></td>
											<td><?php echo $row['Duration'];?></td>
											<td><?php echo $row['Venue'];?></td>
											<td><?php echo $row['Day'];?></td>
											<td><?php echo $row['Time'];?></td>
											<td><?php echo $row['Start_Date'];?></td>
											<td><?php echo $row['End_Date'];?></td>
											<td><?php echo $row['Subjects'];?></td>
											<td><?php echo $row['Overview'];?></td>
											<td colspan='10' align='center'><a href='courupdate.php?i=<?php echo $row['Course_Id']; ?>' class='btn btn-primary' >Update</a></td>
											<td colspan='10' align='center'><a href='courdelete.php?i=<?php echo $row['Course_Id']; ?>'  class='btn btn-warning' >Delete</a></td>	
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