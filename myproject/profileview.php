<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
		<link rel="stylesheet" href="login.css"/>

    </head>


    <body>

        <?php
            require 'nav.php';
        ?>

        <section id="one" class="wrapper style1 align">
            <div class="inner">
                <div class="box">
                <header>
                    <center>
                    <span><img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="image-circle" class="img-responsive" height="200%"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    <h4 style="color: black;"><?php echo $_SESSION['Username'];?></h4>
                    <br>
                </center>
                </header>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="black">RATINGS : </font></b>
                            <font size="+1"><?php echo $_SESSION['Rating'];?></font>
                        </div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="black">Email ID : </font></b>
                            <font size="+1"><?php echo $_SESSION['Email'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="black">Mobile No : </font></b>
                            <font size="+1"><?php echo $_SESSION['Mobile'];?></font>
                        </div>
                        <div class="col-sm-3">
                            <b><font size="+1" color="black">ADDRESS : </font></b>
                            <font size="+1"><?php echo $_SESSION['Addr'];?></font>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                        <div class="12u$">
                            <center>
                                <div class="row uniform">
                                    <div class="3u 12u$(large)">
                                        <a href="uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">upload product</a>
                                    </div>
                                    <div class="3u 12u$(large)">
                                        <a href="changePassPage.html" class="btn btn-danger" style="text-decoration: none;">Change Password</a>
                                    </div>
                                    <div class="3u 12u$(large)">
                                        <a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a>
                                    </div>
                                    
                                    <div class="3u 12u$(large)">
                                        <a href="Login/logout.php" class="btn btn-danger" style="text-decoration: none;">LOG OUT</a>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       


    </body>
</html>
