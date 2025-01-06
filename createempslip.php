<!DOCTYPE html>
<html>
	<head>
		<title>Create Salary Slip</title>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<link rel='stylesheet' href='js/bootstrap.min.js'>
		<link rel='stylesheet' href='backgroundstyle.css'>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style type='text/css'>
		body
			{
				background-color:grey;
			}
		h2
			{
				text-align:center;
				font-family:Times New Roman;
				font-size:60px;
				color:black;
				font-weight:bold;
			}
		.container-fluid
			{
				width:60%;
			}
		</style>
	</head>
	<body>
	<center>
		<div class="container-fluid">
            <div class="block-header">
                <h2>
				<form action="home.php" method="post">
				<button style="background-color: Transparent;border:0px;overflow: hidden;"><i class="fa fa-home" style="font-size:60px; color:black;margin-top:5px;margin-left:5px;"></i></button>&nbsp;&nbsp;Create Salary Slip Form 
				&nbsp;&nbsp;
				</form>
				</h2>
            </div>
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h3>CREATE SALARY SLIP</h3>
								<hr color="red" size="5px">
                            <br>
                                <form action="empsalaryslipcode.php">
									<table border="0" align="center" height="auto" width="90%" cellpadding="10" cellspacing="10">
										<tr>
											<td><input type="text" id="esalid" placeholder="Enter Employee Salary ID" name="esalid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="ename" placeholder="Enter Employee Name" name="ename" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="eid" placeholder="Enter Employee ID" name="eid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="pos" placeholder="Enter Position eg:Data Entry Operator" name="pos" class="form-control" required></td>
										</tr>
										<tr>
											<td>
												<select id='month' name='month' class='form-control' placeholder="Choose Month" required>
													<option value='January'>January<option>
													<option value='February'>February</option>
													<option value='March'>March</option>
													<option value='April'>April</option>
													<option value='May'>May</option>
													<option value='June'>June</option>
													<option value='July'>July</option>
													<option value='August'>August</option>
													<option value='September'>September</option>
													<option value='Octomber'>Octomber</option>
													<option value='November'>November</option>
													<option value='December'>December</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><input type="number" id="ewday" placeholder="Enter Working Days" name="ewday" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="number" id="earday" placeholder="Enter Arrived Days" name="earday" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="number" id="elvday" placeholder="Enter Leave Days" name="elvday" class="form-control"></td>
										</tr>
										<tr>
											<td><textarea name="description" id="description" placeholder="Enter Description" class="form-control"></textarea></td>
										</tr>
										<tr>
											<td><input type="text" id="esalary" placeholder="Enter Basic Salary" name="esalary" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="rupee" placeholder="Enter Salary in Text Format" name="rupee" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="date" id="epdate" placeholder="Enter Payment Date" name="epdate" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="ebname" placeholder="Enter Bank Name" name="ebname" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="text" id="ebacc" placeholder="Enter Bank Account" name="ebacc" class="form-control"></td>
										</tr>
										<tr>
											<td align='center'>
												<button type='submit' class='btn btn-primary'>Submit</button>&nbsp;&nbsp;&nbsp;
												<button type='reset' value='Clear' class='btn btn-primary'>Clear</button>&nbsp;&nbsp;&nbsp;
												<a href="empsalaryslipdatabase.php" class="btn btn-primary">View Database</a>
											</td>
										</tr>
									</table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</center>
	</body>
</html>