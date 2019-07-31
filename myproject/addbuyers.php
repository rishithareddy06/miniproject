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
		$bpassword = $_POST['bpassword'];
		$bemail = $_POST['bemail'];
		$bmobile= $_POST['bmobile'];
		$baddress = $_POST['baddress']; 

		$sql = "INSERT INTO buyer ( bname,busername, bpassword, bemail,bmobile,baddress)
			   VALUES ('$bname', '$busername', '$bpassword', '$bemail','$bmobile','$baddress')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{









			$_SESSION['message'] = "added successfully !!!";
			header("Location: error.php");
		}
		else {
			$_SESSION['message'] = "successfull !!!";
			echo "successsfully added";
		}

		
		
			
		
	

	
?>



