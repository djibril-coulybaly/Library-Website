<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Sign Out</title>
		<link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	</head>

  <body>
	<header class="header">
		<a href="index.php" class="logo">
			<img id="logo" src="Assets/Images/novella_logo.png" alt="Combs 'n' Fro Logo"/>
		</a>
		
		<nav class="header-right">
			<a href="index.php">Homepage</a>
			<a href="account.php">My Novella Account</a>
			<a href="search.php">Search Book Catelogue</a>
  		</nav>
	</header>

	<section id="centerArea">
		<section class="Content">
			<h2>Sign Out of My Novella Account</h2>
			
			<?php
			echo '<p>Your have been signed out from your account successfully. Click <a href="index.php">here</a> to return to the homepage or click <a href="login.html">here</a> to log in to My Novella Account </p>';
			?>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>