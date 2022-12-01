<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - My Novella Account</title>
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
			<?php
			if(!empty($_SESSION['username'])) 
			{ 
				$validUser = mysqli_real_escape_string($db, $_SESSION['username']);
				$result = mysqli_query($db, "SELECT UserName, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile FROM user WHERE username = '$validUser'");
			 
				$row = mysqli_fetch_row($result);
				
				echo "<h2>Welcome ". $row[1] ." ". $row[2]. "</h2><hr><br> ";
				
				
				echo '<table>'."\n";
				
				echo "<tr>";
				echo "<th>User Name</th>";
				echo "<td>", htmlentities($row[0]), "</td>";
				echo "</tr><tr>";
				echo "<th>First Name</th>";
				echo '<td>', htmlentities($row[1]), '</td>';
				echo "</tr><tr>";
				echo "<th>Last Name</th>";
				echo '<td>', htmlentities($row[2]), '</td>';
				echo "</tr><tr>";
				echo "<th>Address Line 1</th>";
				echo '<td>', htmlentities($row[3]), '</td>';
				echo "</tr><tr>";
				echo "<th>Address Line 2</th>";
				echo '<td>', htmlentities($row[4]), '</td>';
				echo "</tr><tr>";
				echo "<th>City</th>";
				echo '<td>', htmlentities($row[5]), '</td>';
				echo "</tr><tr>";
				echo "<th>Telephone</th>";
				echo '<td>', htmlentities($row[6]), '</td>';
				echo "</tr><tr>";
				echo "<th>Mobile</th>";
				echo '<td>', htmlentities($row[7]), '</td>';
				echo "</tr>";
				echo "</table>";	
			}
			
			else
			{
				// user logged out and is redirected back to login screen
				header("Location: login.html");
			}
			?>
			<br><br>
			<a class="btn btn-alt" href="search.php">Search Book Catelogue</a>
			<a class="btn btn-alt" href="accountReservedBook.php">View Reserved Books</a>
			<a class="btn btn-alt" href="signout.php">Sign Out of Account</a>
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
