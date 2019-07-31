<?php
 	session_start();
	$serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "efarming";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
    	$pid=$_POST['pid'];
		$productType = $_POST['type'];
		$productName = dataFilter($_POST['pname']);
		
		$fid = $_SESSION['id'];

		$sql = "DELETE FROM fproduct WHERE pid='$pid'";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$_SESSION['message'] = "Unable to upload Product !!!";
			header("Location: error.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
			header("Location: successd.php");
		}

		

		
	}

	function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>AgroCulture</title>
		
	</head>
	<body>

		<?php require 'nav.php'; ?>

		<!-- One -->

			
					<form method="POST" action="deleteproduct.php" enctype="multipart/form-data">
						<h2>Enter the Product Information here..!!</h2>
						<br>
				
				
							  <select name="type" id="type" required style="background-color:white;color: black;">
								  <option value="" style="color: black;">- Category -</option>
								  <option value="Fruit" style="color: black;">Fruit</option>
								  <option value="Vegetable" style="color: black;">Vegetable</option>
								  <option value="Grains" style="color: black;">Grains</option>
							  </select>
						
					  
						<input type="text" name="pid" id="pid" value="" placeholder="Product id" style="background-color:white;color: black;" />
					  
						<input type="text" name="pname" id="pname" value="" placeholder="Product Name" style="background-color:white;color: black;" />
					  
				<br>
				
				<div class="col-sm-6">
					<button class="button fit" style="width:auto; color:black;">delete</button>
				</div>
			
			</form>
		
	

		<script>
			 CKEDITOR.replace( 'pinfo' );
		</script>
	</body>
</html>
