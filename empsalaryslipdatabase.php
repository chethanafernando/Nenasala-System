<!DOCTYPE html>
<html>
	<head>
		<title>Employee Salary Database</title>
		
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

<!--/////////////////////////////////////////////////////PHP begining for View Details of a Receipt Database/////////////////////////////////////////////////-->	
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
		
	$sql = "SELECT * FROM employeesalaryslip";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0)
		{
	echo "
			<table border='0' cellpadding='10' width='100%'>
				<tr>
					<td>
						<div  class='card'>
						<h2 id='View'>EMPLOYEE SALARY DATABASE</h2>
							<div class='container'>
								<div class='table-responsive'>
									<table border='0' align='center' cellspacing='10' cellpadding='10'>
										<tr>
											<td><a href='home.php' class='btn btn-primary'>Home</a></td>
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
											<th>Emp Salary Id</th>
											<th>Employee Name</th>
											<th>Employee ID</th>
											<th>Position</th>
											<th>Month</th>
											<th>Working Day</th>
											<th>Arrived Day</th>
											<th>Leave Day</th>
											<th>Basic Salary</th>
											<th>Description</th>
											<th>Rupees</th>
											<th>Date</th>
											<th>Bank Name</th>
											<th>Bank Account</th>
										</tr>
									</thead>
		" ;
		
		while($row = $result->fetch_assoc())
			{
				$empsalid=$row["Emp_Sal_Id"];
				$empname=$row["Employee_Name"];
				$eid=$row["Employee_Id"];
				$pos=$row["Position"];
				$month=$row["Month"];
				$wday=$row["Working_Day"];
				$aday=$row["Arrived_Day"];
				$lday=$row["Leave_Day"];
				$bs=$row["Basic_Salary"];
				$desc=$row["Description"];
				$rupee=$row["Rupees"];
				$date=$row["Date"];
				$bname=$row["Bank_Name"];
				$bacct=$row["Bank_Account"];
		
				echo " 
					<tbody  id='myTable'>
						<tr>
							<td>$empsalid</td>
							<td>$empname</td>
							<td>$eid</td>
							<td>$pos</td>
							<td>$month</td>
							<td>$wday</td>
							<td>$aday</td>
							<td>$lday</td>
							<td>$bs</td>
							<td>$desc</td>
							<td>$rupee</td>
							<td>$date</td>
							<td>$bname</td>
							<td>$bacct</td>
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
		    </table>";
		}
?>
	</body>
</html>