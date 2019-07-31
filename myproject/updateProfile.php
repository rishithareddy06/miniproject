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
        $name = dataFilter($_POST['name']);
        $mobile = dataFilter($_POST['mobile']);
        $user = dataFilter($_POST['uname']);
        $email = dataFilter($_POST['email']);
        $section = dataFilter($_POST['section']);
        $post = dataFilter($_POST['post']);
        
        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['Username'] = $user;
        $_SESSION['MobileNo'] = $mobile;
        $_SESSION['Section'] = $section;
        $_SESSION['Post'] = $post;
        
    }
    $id = $_SESSION['id'];

    $sql = "UPDATE buyer SET bname='$name',busersername='$user',bmobile='$mobile',bemail='$email',Post='$post' WHERE bid='$id';";

    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION['message'] = "Profile Updated successfully !!!";
        header("Location: profileView.php");
    }
    else
    {
        $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
        header("Location: error.php");
    }

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
