<?php
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$user = $_POST['uname'];
	$email = $_POST['email'];
	$pass =	$_POST['pass'];
	$category =($_POST['category']);
    $addr = ($_POST['addr']);

	$_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Password'] = $pass;
    $_SESSION['Username'] = $user;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['Category'] = $category;
    $_SESSION['Addr'] = $addr;
    $_SESSION['Rating'] = 0;
}


$serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "efarming";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

$length = strlen($mobile);

if($length != 10)
{
	$_SESSION['message'] = "Invalid Mobile Number !!!";
	header("location: error.php");
	die();
}

if($category == 0)
{
    $sql = "SELECT * FROM farmer WHERE femail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM farmer WHERE femail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    }
    else
    {
    	$sql = "INSERT INTO farmer (fname, fusername, fpassword, fmobile, femail, faddress)
    			VALUES ('$name','$user','$pass','$mobile','$email','$addr')";

    	if (mysqli_query($conn, $sql))
    	{
    	    $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $sql = "SELECT * FROM farmer WHERE fusername='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['fid'];

            

            $_SESSION['message'] =

                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $to      = $email;
            $subject = "Account Verification ( ArtCircle.com )";
            $message_body = "
            Hello '.$user.',

            Thank you for signing up!

            Please click this link to activate your account:

            http://localhost//Login/verify.php?email=".$email;

            //$check = mail( $to, $subject, $message_body );

            header("location: profile.php");
    	}
    	else
    	{
    	    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	    $_SESSION['message'] = "Registration failed!";
            header("location: error.php");
    	}
    }
}

elseif ($category == 1) {
    

    $sql = "SELECT * FROM buyer WHERE bemail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM buyer WHERE bemail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    }
    else
    {
        $sql = "INSERT INTO buyer (bname, busername, bpassword, bemail, bmobile, baddress)
                VALUES ('$name','$user','$pass','$email','$mobile','$addr')";

        if (mysqli_query($conn, $sql))
        {
            $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $sql = "SELECT * FROM buyer WHERE busername='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['bid'];

            

            $_SESSION['message'] =

                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $to      = $email;
            $subject = "Account Verification ( ArtCircle.com )";
            $message_body = "
            Hello '.$user.',

            Thank you for signing up!

            Please click this link to activate your account:

            http://localhost//Login/verify.php?email=".$email;

            //$check = mail( $to, $subject, $message_body );

            header("location: profile.php");
        }
        else
        {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $_SESSION['message'] = "buyer Registration failed!";
            header("location: error.php");
        }
    }
}
elseif ($category == 2) {
    $sql = "SELECT * FROM admin WHERE aemail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE aemail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        //echo $_SESSION['message'];
        header("location: error.php");
    }
    else
    {
        $sql = "INSERT INTO admin (aname, ausername, apassword,  amobile, aemail, aaddress)
                VALUES ('$name','$user','$pass','$mobile','$email','$addr')";

        if (mysqli_query($conn, $sql))
        {
            $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $sql = "SELECT * FROM admin WHERE ausername='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['aid'];

            $_SESSION['message'] =

                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            $to      = $email;
            $subject = "Account Verification ( ArtCircle.com )";
            $message_body = "
            Hello '.$user.',

            Thank you for signing up!

            Please click this link to activate your account:

            http://localhost/AgroCulture/Login/verify.php?email=".$email."&hash=".$hash;

            //$check = mail( $to, $subject, $message_body );

            header("location: profile.php");
        }
        else
        {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $_SESSION['message'] = "Registration not successfull!";
            header("location: error.php");
        }
    }
    # code...

}



?>
