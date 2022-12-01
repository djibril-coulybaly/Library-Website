<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Reserved Books</title>
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
			<h2>My Reserved Books</h2>
			
			<?php
			$username = $_SESSION['username'];
			$sql = "SELECT * FROM book LEFT JOIN reservedbook ON book.ISBN = reservedbook.ISBN WHERE reservedbook.UserName = '$username'";
			$results = mysqli_query($db, $sql);
			$check = mysqli_num_rows($results);
			
			if($check >= 1)
			{
				while($row = mysqli_fetch_row($results))
				{	
					echo '<table>'."\n";
					echo "<tr>";
					echo "<th>ISBN:</th>";
					echo "<td>", $row[0], "</td>";
					echo "</tr><tr>";
					echo "<th>Book Title:</th>";
					echo '<td>', $row[1], '</td>';
					echo "</tr><tr>";
					echo "<th>Author:</th>";
					echo '<td>', $row[2], '</td>';
					echo "</tr><tr>";
					echo "<th>Edition:</th>";
					echo '<td>', $row[3], '</td>';
					echo "</tr><tr>";
					echo "<th>Year of Publication:</th>";
					echo '<td>', $row[4], '</td>';
					echo "</tr><tr>";
					echo "<th>Reserve: </th>";
					echo '<td>';
					

					echo('<form action="delete.php" method="POST"><input type="hidden" ');
					echo('name="ISBN" value="'.$row[0].'">'."\n");
					echo('<input type="submit" value="Delete Book Reservation" name="delete">');
					echo "\n</form>\n";
					echo '</td>';

					
					echo "</tr>";
					echo "</table>";
					echo "<br>";
				}
			}
			else
			{
				echo '<p>Your have no book reservations on your account. Click <a href="account.php">here</a> to return to My Novella Account</p>';
			}
				
			?>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
