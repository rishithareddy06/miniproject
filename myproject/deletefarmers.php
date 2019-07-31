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

    
		$fid = $_POST['fid'];
		$fname = $_POST['fname'];
		$fusername = $_POST['funame'];
		$fpassword = $_POST['fpassword'];
		$femail = $_POST['femail'];
		$fmobile= $_POST['fmobile'];
		$faddress = $_POST['faddress']; 

		$sql = "DELETE FROM farmer where fid='$fid'";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{









			$_SESSION['message'] = "Unable to delete farmer !!!";
			header("Location: error.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
			echo "successsfully deleted";
		}

		
		
			
		
	

	
?>




