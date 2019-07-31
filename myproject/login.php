<?php
    session_start();
    
    $user = $_POST['uname'];
    $pass = $_POST['pass'];
    $category =$_POST['category'];
    
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "efarming";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($category == 0)
{
    $sql = "SELECT * FROM farmer WHERE fusername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        
       // header("location: error.php");
    }
    else
    {
        $User = $result->fetch_assoc();

        if ($_POST['pass']==$User['fpassword'])
        {
            $_SESSION['id'] = $User['fid'];
            $_SESSION['Password'] = $User['fpassword'];
            $_SESSION['Email'] = $User['femail'];
            $_SESSION['Name'] = $User['fname'];
            $_SESSION['Username'] = $User['fusername'];
            $_SESSION['Mobile'] = $User['fmobile'];
            $_SESSION['Addr'] = $User['faddress'];
            $_SESSION['Active'] = $User['factive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 1;
            $_SESSION['Rating'] = 0;
            header("location: homef.php");
        }
        else
        {
            //echo mysqli_error($conn);

            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
        }
    }
}
elseif ($category == 1) {

	$sql = "SELECT * FROM buyer WHERE busername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    }

    else
    {
        $User = $result->fetch_assoc();

        if ($_POST['pass']==$User['bpassword'])
        {
            $_SESSION['id'] = $User['bid'];
     
            $_SESSION['Password'] = $User['bpassword'];
            $_SESSION['Email'] = $User['bemail'];
            $_SESSION['Name'] = $User['bname'];
            $_SESSION['Username'] = $User['busername'];
            $_SESSION['Mobile'] = $User['bmobile'];
            $_SESSION['Addr'] = $User['baddress'];
            $_SESSION['Active'] = $User['bactive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 0;

            //echo $_SESSION['Email']."  ".$_SESSION['Name'];

            header("location: homeb.php");
        }
}
}
else if($category == 2) {
	# code...
	/*$sql = "SELECT * FROM admin WHERE ausername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    }

    else
    {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['apassword']))
        {
            $_SESSION['id'] = $User['aid'];
     
            $_SESSION['Password'] = $User['apassword'];
            $_SESSION['Email'] = $User['aemail'];
            $_SESSION['Name'] = $User['aname'];
            $_SESSION['Username'] = $User['ausername'];
            $_SESSION['Mobile'] = $User['amobile'];
            $_SESSION['Addr'] = $User['aaddress'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 2;

            echo $_SESSION['Email']."  ".$_SESSION['Name'];*/

            header("location:homea.php");
            /*
        }
}
}
else
        {
            //echo mysqli_error($conn);
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
        }
    */
}
?>