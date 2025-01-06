<!DOCTYPE html>
<html>
	<head>
		<title>Certificate</title>
		
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
		
	$sql = "SELECT * FROM certificate";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
		<h1>CERTIFICATE</h1>
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>CERTIFICATE</h2>
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
											<th>Certificate_Id</th>
											<th>Certificate_No</th>
											<th>Student_Id</th>
											<th>Course_Id</th>
											<th>Issued</th>
											<th>Issued_Date</th>
										</tr>
									</thead>
		" ;
		
		while($row = $result->fetch_assoc())
			{
				$ceid=$row["Certificate_Id"];
				$ceno=$row["Certificate_No"];
				$cesid=$row["Student_Id"];
				$cecid=$row["Course_Id"];
				$ceissue=$row["Issued"];
				$ceissdate=$row["Issued_Date"];
				
				echo " 
					<tbody  id='myTable'>
						<tr>
							<td>$ceid</td>
							<td>$ceno</td>
							<td>$cesid</td>
							<td>$cecid</td>
							<td>$ceissue</td>
							<td>$ceissdate</td>
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
									<form action='certicode.php' method='post'>
										<table border='0'cellpadding='10' cellspacing='10' align='center' id='tbl1'>	
											<div class='form-group'>
												<tr>
													<td><label>Certificate ID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter New ID' name='ceid' id='ceid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Certificate Number</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Certificate Number' name='ceno' id='ceno' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Student ID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Student ID' name='cesid' id='cesid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Course ID</label></td>
													<td><input type='text' class='form-control' placeholder='Enter Course ID' name='cecid' id='cecid' size='100' required></td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Issued</label></td>
													<td align='left'><input type='radio' name='issue' id='issue' value='Yes' checked>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type='radio' name='issue' id='issue' value='No'>&nbsp;&nbsp;No</td>
												</tr>
											</div>
											<div class='form-group'>
												<tr>
													<td><label>Issued Date</label></td>
													<td><input type='date' class='form-control' name='issuedate' id='issuedate' size='100' required></td>
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
												<th>Certificate_Id</th>
												<th>Certificate_No</th>
												<th>Student_Id</th>
												<th>Course_Id</th>
												<th>Issued</th>
												<th>Issued_Date</th>
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
	
	$sql = mysqli_query($conn,"SELECT * FROM certificate");
	
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
											<td><?php echo $row['Certificate_Id'];?></td>
											<td><?php echo $row['Certificate_No'];?></td>
											<td><?php echo $row['Student_Id'];?></td>
											<td><?php echo $row['Course_Id'];?></td>
											<td><?php echo $row['Issued'];?></td>
											<td><?php echo $row['Issued_Date'];?></td>
											<td colspan='10' align='center'><a href='certiupdate.php?i=<?php echo $row['Certificate_Id']; ?>' class='btn btn-primary' >Update</a></td>
											<td colspan='10' align='center'><a href='certidelete.php?i=<?php echo $row['Certificate_Id']; ?>'  class='btn btn-warning' >Delete</a></td>	
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