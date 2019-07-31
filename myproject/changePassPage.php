
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


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = $_POST['uname'];
        $currPass = $_POST['currPass'];
        $newPass = $_POST['newPass'];
        $conNewPass = $_POST['conNewPass'];
        //$newHash = dataFilter( md5( rand(0,1000) ) );
    }

    $sql = "SELECT * FROM buyer WHERE busername='$user'";
    $result = mysqli_query($conn, $sql);
    //$num_rows = mysql_num_rows($result);


    /*if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentials!";
        echo "error";
        //header("location: error.php");
    }*/
    //else
    {
      //  $User = $result->fetch_assoc();

        //if($_POST['currPass']==  $_SESSION['Password'])
        {
            if($newPass == $conNewPass)
            {
                $conNewPass = $_POST['conNewPass'];
                //$currHash = $_SESSION['Hash'];
                $sql = "UPDATE buyer SET bpassword='$conNewPass' WHERE bpassword='$currPass';";

                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    $_SESSION['message'] = "Password changed Successfully!";
                    header("location: success.php");
                }
                else
                {
                   $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
                    header("location: error.php");
                }
            }
        }
        else
        {
            $_SESSION['message'] =  "Invalid current User Credentials!";
            header("location:error.php");
        }
    

    }

?>
