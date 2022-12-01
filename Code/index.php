<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Homepage</title>
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
			<h2>Welcome to Novella</h2>
			<p>This is a book reservation website where you can search our database for books and reserve them </p>
			<br>
			<?php
			session_start(); 
			
			if(!empty($_SESSION['username'])) 
			{ 
				echo "<div>";
				echo "	<p>Sign out of your Novella account</p>";
				echo '	<a class="btn btn-alt" href="signout.php">Sign Out</a>';
				echo "</div>";
			}
			else
			{
				echo "	<p>Login to your account to avail of all services provided by Novella</p>";
				echo '	<a class="btn btn-alt" href="login.html">Sign In</a>';
				
				echo "<br>";
				
				echo "	<p>Don't have an account? Click the register button below to create an account</p>";
				echo '<a class="btn btn-alt" href="register.php">Register</a>';
			}
			?>
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
