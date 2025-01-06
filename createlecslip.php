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
                                <form action="lecsalaryslipcode.php">
									<table border="0" align="center" height="auto" width="90%" cellpadding="10" cellspacing="10">
										<tr>
											<td><input type="text" id="lsalid" placeholder="Enter Lecturer Salary ID" name="lsalid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="lname" placeholder="Enter Lecturer Name" name="lname" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="lid" placeholder="Enter Lecturer ID" name="lid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="pos" placeholder="Enter Position eg:Web Developer" name="pos" class="form-control" required></td>
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
										<tr>
											<td><input type="number" id="lnowd" placeholder="Enter Working Days" name="lnowd" class="form-control"></td>
										</tr>
										<tr>
											<td><textarea name="description" id="description" placeholder="Enter Description" class="form-control"></textarea></td>
										</tr>
										<tr>
											<td><input type="text" id="lsalary" placeholder="Enter Basic Salary" name="lsalary" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="rupee" placeholder="Enter Salary in Text Format" name="rupee" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="date" id="lcdate" placeholder="Enter Payment Date" name="lcdate" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="lbname" placeholder="Enter Bank Name" name="lbname" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="text" id="lbacc" placeholder="Enter Bank Account" name="lbacc" class="form-control"></td>
										</tr>
										<tr>
											<td align='center'>
												<button type='submit' class='btn btn-primary'>Submit</button>&nbsp;&nbsp;&nbsp;
												<button type='reset' value='Clear' class='btn btn-primary'>Clear</button>&nbsp;&nbsp;&nbsp;
												<a href="lecsalaryslipdatabase.php" class="btn btn-primary">View Database</a>
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