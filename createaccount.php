<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--CSS styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="box">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
		<br>
			<div class="header">
				<h4 style="color:yellow;">Create Account</h4>
			</div>
			<div class="card-body" >
				<form action="getdata.php" method="post">
					<div class="input-group form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
					</div>
					<div class="input-group form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
					<div class="input-group form-group">
						<select id='role' name='role' class='form-control' required>
							<option value=''>Select Role</option>
							<option value='Administrator'>Administrator</option>
							<option value='Supervisor'>Supervisor</option>
						</select>
					</div>
					<div class="form-group">	
						<input type="submit" value="Create" class="btn btn-primary" onMouseOver="this.style.color='yellow'" onMouseOut="this.style.color='white'">
						<a href="login.php" style="color:white;text-decoration:none;" onMouseOver="this.style.color='yellow'" onMouseOut="this.style.color='white'" class="btn btn-warning">Back To Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>