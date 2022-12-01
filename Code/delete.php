<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Delete Book Reservation</title>
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
			<h2>Delete Book Reservation</h2>
			
			<?php
			$username = $_SESSION['username'];
			if ( isset($_POST['delete']) && isset($_POST['ISBN']) ) 
			{
				$id = mysqli_real_escape_string($db, $_POST['ISBN']);
				$sql= "DELETE FROM reservedbook WHERE ISBN = '$id' AND UserName = '$username'";
				mysqli_query($db, $sql);
				echo '<p>Your book reservation has been deleted from your account. Click <a href="accountReservedBook.php">here</a> to check out all your book reservations on My Novella Account</p>';
				return;
			}
			?>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
