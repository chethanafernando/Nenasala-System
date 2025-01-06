<! DOCTYPE html>
<html>
	<head>
		<title>Rating</title>
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
			label,h2
				{
					font-size:70px;
					font-family:Arial Black;
					color:yellow;
					text-shadow: 2px 2px black;
				}
			td
				{
					font-size:80px;
					font-family:Arial Black;
					text-align:center;
				}
			#type 
				{
					border-radius: 15px 50px 30px;
					border: 2px solid #609;
					padding: 20px; 
					width: 500px;
					height: 150px;
					text-align:center;
					font-size:90px;
				}
			hr.new 
				{
					border: 10px solid blue;
					border-radius: 5px;
				}
			marquee
				{
					font-size:30px;
					color:yellow;
					font-family:cooper black;
				}
		</style>
	</head>
	<body>
<?php 
    // Setting up connection with database nenasala_database
    $connection = mysqli_connect("localhost", "root", "", "nenasala_database"); 
      
    // Check connection 
    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    } 
      
    $sql = "SELECT Student_Id FROM student"; 
	$sql2 = "SELECT Employee_Id FROM employee";
	$sql3 = "SELECT Lecturer_Id FROM lecturer";
	$sql4 = "SELECT Course_Id FROM course";
      
    // First Query Execute the query and store the result set 
    $result = mysqli_query($connection, $sql); 
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result);  
        mysqli_free_result($result);
	} 
	
	//Second Query
	$result = mysqli_query($connection, $sql2);  
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row2 = mysqli_num_rows($result);  
        mysqli_free_result($result); 
	} 
	
	//Third Query
	$result = mysqli_query($connection, $sql3);  
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row3 = mysqli_num_rows($result);  
        mysqli_free_result($result); 
	} 
	
	//Fourth Query
	$result = mysqli_query($connection, $sql4);  
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row4 = mysqli_num_rows($result);  
        mysqli_free_result($result); 
	} 
	
	// Connection close  
    mysqli_close($connection); 
  
   
echo "
			<form action='home.php' method='post'>
				<button style='background-color: Transparent;border:0px;overflow: hidden;'><i class='fa fa-home' style='font-size:70px;text-align:left; color:yellow;margin-top:5px;margin-left:5px;'></i></button>
			</form>
		<center>
			<h1>RATING</h1>
			<marquee>The Best Place for Learn Information Technology</marquee>
			<hr class='new'>
			<table border='0' width='90%' height='100%' cellspacing='10' cellpadding='10'>
				<tr>
					<td><label>STUDENT COUNT</label></td>
					<td><input type='text' value='$row' id='type'></td>
				</tr>
				<tr>
					<td><label>LECTURER COUNT</label></td>
					<td><input type='text' value='$row3' id='type'></td>
				</tr>
				<tr>
					<td><label>EMPLOYEE COUNT</label></td>
					<td><input type='text' value='$row2' id='type'></td>
				</tr>
				<tr>
					<td><label>COURSE COUNT</label></td>
					<td><input type='text' value='$row4' id='type'></td>
				</tr>
			</table>
			</center>
		";	 
?>
	</body>
</html>