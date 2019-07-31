<?php
 	session_start();
	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
	}

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>efarming</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		
		<link rel="stylesheet" href="login.css"/>
		<link rel="stylesheet" type="text/css" href="indexFooter.css">
		
		
	</head>
	<?php require 'nav.php'; ?>
	<body>



		<!-- One -->
			<section id="one" class="wrapper style1 align-center" style="height: 600px">
				<div class="container">
					<h2>Welcome to Digital Market</h2>
					<br /><br />
					<div class="row 200%">
						<section class="4u 12u$(small)">
							<a href="profileView.php"><img src="profileDefault.png"></a>
							<p>Your Profile</p>
						</section>
						<section class="4u 12u$(small)">
							<a href="productMenu.php?n=1" name="catSearch"><img src="search.png"></a>
							<p>Search according to your needs</p>
						</section>
						<section class="4u$ 12u$(small)">
							<a href="productmenu.php?n=0"><img src="product.png"></a>
							<p>Our products</p>
						</section>
					</div>
				</div>
			</section>



		




	</body>
</html>
