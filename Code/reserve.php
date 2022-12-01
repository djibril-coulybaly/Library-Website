<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Reservation Confirmation</title>
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
			<h2>Reservation Confirmation</h2>
			
			<?php
			if ( isset($_SESSION['username']) )
			{
				$username = $_SESSION['username'];
				if(!empty($_SESSION['username'])) 
				{ 
					if ( isset($_POST['reserve']) && isset($_POST['ISBN']) ) 
					{
						$id = mysqli_real_escape_string($db, $_POST['ISBN']);
						$reserveDate = date("Y/m/d");
						$insert = "INSERT INTO reservedbook (ISBN, UserName, ReservedDate) VALUES ('$id', '$username', '$reserveDate')";
						$update = "UPDATE book SET Reserved = 'Y' WHERE ISBN = '$id'";
						mysqli_query($db, $insert);
						mysqli_query($db, $update);
						echo '<p>Your book reservation has been added into you Novella account. Click <a href="account.php">here</a> to return to My Novella Account</p>';
						return;
					}
				}
				else
				{
					echo '<p>In order to reserve a book, you must have a My Novella Account. Please Click <a href="login.html">here</a> to log in or click <a href="register.php"> here to register</p>';
				}
			}
			else
			{
				echo '<p>In order to reserve a book, you must have a My Novella Account. Please Click <a href="login.html">here</a> to log in or click <a href="register.php"> here to register</p>';
			}
			
			?>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
