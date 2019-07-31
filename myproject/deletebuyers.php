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

    
		$bid = $_POST['bid'];
		$bname = $_POST['bname'];
		$busername = $_POST['buname'];
		
		$sql = "DELETE FROM buyer where bname='$bname'";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{

			$_SESSION['message'] = "Unable to delete buyer !!!";
			header("Location: error.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
			echo "successsfully deleted";
		}

		
		
			
		
	

	
?>




