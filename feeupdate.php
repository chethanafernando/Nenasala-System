<!DOCTYPE html>
<html>
	<title>Changing Form</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='js/bootstrap.min.js'>
	<link rel='stylesheet' href='updatestyle.css'>
	<style type='text/css'>
		body
			{
				background-color:red;
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
				$sql = "SELECT * FROM fee WHERE Fee_Id='$id'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					$fid=$row["Fee_Id"];
					$fcname=$row["Course_Name"];
					$fee=$row["Fee"];
					$regfee=$row["Registration_Fee"];
					$finstall=$row["Installments"];
					$fdis=$row["Discount"];
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
					<h1 style='text-align:center;font-weight:bold;font-family:Times New Roman;color:yellow;'><a href='fee.php' style="font-size:35px;color:yellow;"><i class="fa fa-arrow-circle-left"></i></a>&nbsp;&nbsp;&nbsp;Change Record</h1>
				</div>
					 <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<center>
									<form action='feeupdate2.php'>
										<table border='0' width='80%'>
											<tr>
												<td>Fee_ID</td>
												<td>::</td>
												<td><input type="text" name="fid" id="fid" class='form-control' value="<?php echo $fid; ?>" readonly></td>
											</tr>
											<tr>
												<td>Course name</td>
												<td>::</td>
												<td><input type="text" name="fname" id="fname" class='form-control' value="<?php echo $fcname; ?>"></td>
											</tr>
											<tr>
												<td>Fee</td>
												<td>::</td>
												<td><input type="text" name="fee" id="fee" class='form-control' value="<?php echo $fee; ?>"></td>
											</tr>
											<tr>
												<td>Registration Fee</td>
												<td>::</td>
												<td><input type="text" name="regfee" id="regfee"  class='form-control' value="<?php echo $regfee; ?>"></td>
											</tr>
											<tr>
												<td>Installment</td>
												<td>::</td>
												<td><input type="text" name="finstall" id="finstall"   class='form-control' value="<?php echo $finstall; ?>"></td>
											</tr>
											<tr>
												<td>Discount</td>
												<td>::</td>
												<td><input type="text" name="fdis" id="fdis" class='form-control' value="<?php echo $fdis; ?>"></td>
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