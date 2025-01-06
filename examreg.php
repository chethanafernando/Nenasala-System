<!DOCTYPE html>
<html>
	<head>
		<title>Exam Registration</title>
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
	<body bgcolor='blue'>
	<center>
		<div class="container-fluid">
            <div class="block-header">
                <h2>
				<form action="home.php" method="post">
				<button style="background-color: Transparent;border:0px;overflow: hidden;"><i class="fa fa-home" style="font-size:60px; color:black;margin-top:5px;margin-left:5px;"></i></button>&nbsp;&nbsp;Registration Form 
				&nbsp;&nbsp;
				</form>
				</h2>
            </div>
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h3>EXAM FORM</h3>
								<hr color="red" size="5px">
                            <br>
                                <form action="examregcode.php">
									<table border="0" align="center" height="auto" width="90%" cellpadding="10" cellspacing="10">
										<tr>
											<td><input type="text" id="eid" placeholder="Enter Exam ID" name="eid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="regno" placeholder="Enter Registration Number" name="regno" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="sid" placeholder="Enter Student ID" name="sid" class="form-control" required></td>
										</tr>
										<tr>
											<td><input type="text" id="sname" placeholder="Enter Student Name" name="sname" class="form-control" required></td>
										</tr>
										<tr>
											<td>
												<select id='cname' name='cname' class='form-control' placeholder="Choose Course Name">
													<option value='Diploma in Information Communication Technology'>Diploma in Information Communication Technology<option>
													<option value='Diploma in Web Engineering'>Diploma in Web Engineering</option>
													<option value='Diploma in Software Engineering'>Diploma in Software Engineering</option>
													<option value='Diploma in Graphic Designing'>Diploma in Graphic Designing</option>
													<option value='Diploma in AutoCAD'>Diploma in AutoCAD</option>
													<option value='Diploma in English'>Diploma in English</option>
													<option value='Diploma in Networking'>Diploma in Networking</option>
													<option value='Certificate in Computer Application'>Certificate in Computer Application</option>
													<option value='Certificate in Graphic Designing'>Certificate in Graphic Designing</option>
													<option value='Certificate in AutoCAD'>Certificate in AutoCAD</option>
													<option value='Certificate in English'>Certificate in English</option>
													<option value='Certificate in Computer Hardware'>Certificate in Computer Hardware</option>
													<option value='Certificate in Web Development'>Certificate in Web Development</option>
													<option value='N-Kid course'>N-Kid course</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><input type="text" id="sub" placeholder="Enter Subjects (use slash(/) to line break)" name="sub" class="form-control" required></td>
										</tr>
										<tr>
											<td align="left">
												<input type="checkbox" name="testtype1" id="testtype1" value="Pratical">&nbsp;&nbsp;Pratical&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="testtype2" id="testtype2" value="Written">&nbsp;&nbsp;Written&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="testtype3" id="testtype3" value="Presentation">&nbsp;&nbsp;Presentation&nbsp;&nbsp;&nbsp;&nbsp;
											</td>
										</tr>
										<tr>
											<td><input type="text" id="venue" placeholder="Enter Venue" name="venue" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="date" id="date" placeholder="Enter Date" name="date" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="time" id="time" placeholder="Enter Time" name="time" class="form-control"></td>
										</tr>
										<tr>
											<td><input type="text" id="duration" placeholder="Enter Duration" name="duration" class="form-control"></td>
										</tr>
										<tr>
											<td>
												<button type='submit' class='btn btn-primary'>Submit</button>&nbsp;&nbsp;&nbsp;
												<button type='reset' value='Clear' class='btn btn-primary'>Clear</button>&nbsp;&nbsp;&nbsp;
												<a href="examregdatabase.php" class="btn btn-primary">View Database</a>
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