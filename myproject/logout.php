<?php
	session_start();
		$_SESSION['logged_in'] = false;
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
        <title>efarming: LogOut</title>
    
    </head>

	<body>
	   <?php
            require 'nav.php';
        ?>
	    <section id="banner">
			<div class="container">
                <header class="major">
                    <h2>Thanks for visiting !!!</h2>
					<center>
                    	<p>You have been succesfully logged out !!!</p>
                        <div class="6u 12u$(xsmall)">
							<br />
                            <a href="index.php" class="button special">HOME</a>
                        </div>
                    </center>
                </header>
                </div>
            </div>
        </section>

    	
	</body>
</html>
