<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Search Results</title>
		<link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	</head>

  <body>
	<header class="header">
		<a href="index.php" class="logo">
			<img id="logo" src="Assets/Images/novella_logo.png" alt="Combs 'n' Fro Logo"/>
		</a>
		
		<nav class="header-right">
			<a href="index.php">Home</a>
			<a href="account.php">My Novella Account</a>
			<a href="search.php">Search Book Catelogue</a>
  		</nav>
	</header>

	<section id="centerArea">
		<section class="Content">
			<h2>Search Results</h2>
			
			<?php
			//Checking Book Catalogue
			if (isset($_POST['titleSearch']) || isset($_POST['categorySearch']) || isset($_POST['authorSearch'])) 
			{
				if (isset($_GET['page_no'])) 
				{
					$pageNo = $_GET['page_no'];
				}
				else 
				{
					$pageNo = 1;
				}
				
				$no_of_results_per_page = 5;
				$offset = ($pageNo - 1) * $no_of_results_per_page;
				
				$total_pages_sql = "SELECT COUNT(*) FROM book";
				$answer = mysqli_query($db, $total_pages_sql);
				$total_rows = mysqli_fetch_array($answer)[0];
				$total_pages = ceil($total_rows / $no_of_results_per_page);
			
				
				if(isset($_POST['title']))
				{
					$search = mysqli_real_escape_string($db, $_POST['title']);
					$sql = "SELECT * FROM book WHERE BookTitle LIKE '%$search%'";
					$results = mysqli_query($db, $sql);
				}	
				
				if(isset($_POST['category']))
				{
					$search = mysqli_real_escape_string($db, $_POST['category']);
					$sql = "SELECT * FROM book WHERE Category LIKE '%$search%'";
				}
				
				if(isset($_POST['author']))
				{
					$search = mysqli_real_escape_string($db, $_POST['author']);
					$sql = "SELECT * FROM book WHERE Author LIKE '%$search%'";
				}
				
				// start the query and display the specified books
				if( isset( $_POST['title'] ) || isset( $_POST['category'] ) || isset( $_POST['author'] ) )
				{	
					$results = mysqli_query($db, $sql);
					$check = mysqli_fetch_row($results);
					if($check > 0)
					{
						while($row = mysqli_fetch_array($results))
						{	
							echo '<table>'."\n";
							echo "<tr>";
							echo "<th>ISBN:</th>";
							echo "<td>", htmlentities($row['ISBN']), "</td>";
							echo "</tr><tr>";
							echo "<th>Book Title:</th>";
							echo '<td>', htmlentities($row['BookTitle']), '</td>';
							echo "</tr><tr>";
							echo "<th>Author:</th>";
							echo '<td>', htmlentities($row['Author']), '</td>';
							echo "</tr><tr>";
							echo "<th>Edition:</th>";
							echo '<td>', htmlentities($row['Edition']), '</td>';
							echo "</tr><tr>";
							echo "<th>Year of Publication:</th>";
							echo '<td>', htmlentities($row['Year']), '</td>';
							echo "</tr><tr>";
							echo "<th>Reserve: </th>";
							
							if($row['Reserved'] != 'Y')
							{
								echo '<td>';
								echo('<form action="reserve.php" method="POST"><input type="hidden" ');
								echo('name="ISBN" value="'.$row['ISBN'].'">'."\n");
								echo('<input type="submit" value="Reserve" name="reserve">');
								echo "\n</form>\n";
								echo '</td>';
							}
							else
							{
								echo '<td>';
								echo"Already Reserved";
								echo '</td>';
							}
							
							echo "</tr>";
							echo "</table>";
							echo "<br>";
						}
					}
					else
					{
						echo '<p>There is no books under your search criteria. Click <a href="search.php">here</a> to search for another book</p>';
					}
				}// end start the query and display the books	
			}
			?>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
