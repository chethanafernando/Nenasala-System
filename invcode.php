<?php
/////////////////////////////////////////////Image Upload Start//////////////////////////////////////////////////////////////////////////////////////////////////////
/*target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
	else 
	{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
	else 
	{
        echo "Sorry, there was an error uploading your file.";
    }
}*/
////////////////////////////////////////////////////////////Image upload End////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////Begin of Insert Data to the Database//////////////////////////////////////////////////////////////////////////
//connect to the database
	$link = mysqli_connect("localhost", "root", "", "nenasala_database");

//check connection
if($link === false)
	{
		die("ERROR: Could not connect.". mysqli_connect_error());
	} 
		
//Escape user inputs for security
		$invid = mysqli_real_escape_string($link, $_REQUEST['invid']);
		$invname = mysqli_real_escape_string($link, $_REQUEST['invname']);
		$invmodel = mysqli_real_escape_string($link, $_REQUEST['invmodel']);
		$qty = mysqli_real_escape_string($link, $_REQUEST['qty']);
		$byprice = mysqli_real_escape_string($link, $_REQUEST['byprice']);
		$bydate = mysqli_real_escape_string($link, $_REQUEST['bydate']);
		$reciept = mysqli_real_escape_string($link, $_REQUEST['fileToUpload']);

// attempt insert query execution
		$sql = "INSERT INTO inventory (Inventory_Id, Item_Name, Item_Model, Quantity, Buying_Price, Buying_Date, Reciept) 
			values('$invid', '$invname', '$invmodel', '$qty', '$byprice', '$bydate', '$reciept')";
		if(mysqli_query($link, $sql))
		{
			echo "<script>
				alert('***** Data Saved Successfully *****');
				window.location.href='inventory.php';
				</script>";
		}
		else
		{
			echo"ERROR: Could not be able to execute";
		}

//close connection
	mysqli_close($link);
////////////////////////////////////////////////////////////End of Insert Data////////////////////////////////////////////////////////////////////////////////////////
?>
