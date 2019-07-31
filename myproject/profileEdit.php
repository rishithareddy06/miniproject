<?php
    session_start();
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
        
    </head>

    <body class="subpage">

        <?php
            require 'nav.php';
        ?>

        <section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
            <div class="inner">
                <div class="box">
                <header>
                    <span class="image left"><img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="img-circle" class="img-responsive" height="200px"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    <h4><?php echo $_SESSION['Username'];?></h4>
                    <br>
                    
                </header>
                <form method="post" action="updateProfile.php">
                    <div class="row uniform">
                        <div class="8u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="<?php echo $_SESSION['Name'];?>" placeholder="Full Name" required />
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <input type="text" name="mobile" id="mobile" value="<?php echo $_SESSION['MobileNo'];?>" placeholder="Mobile No" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="uname" id="uname" value="<?php echo $_SESSION['Username'];?>" placeholder="Username" required/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="email" name="email" id="email" value="<?php echo $_SESSION['Email'];?>" placeholder="Email" required/>
                        </div>
                        
                        

                        
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="post" id="post" value="<?php echo $_SESSION['Post'];?>" placeholder="Post Name" required/>
                        </div>
                       
                        <div class="12u$">
                        <center>
                            <input type="submit" class = "button special" value="Update Profile" />
                        </center>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>

        
    </body>
</html>
