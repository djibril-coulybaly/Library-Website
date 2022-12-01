<?php
require_once "db.php";
session_start(); 
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Search Book Catelogue</title>
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
			<h2>Search for a Book by: </h2>
			<hr><br>
			<form method="POST" action="searchResults.php">
				<br>
				<h3>1) Title</h3>
				<input type = "text" placeholder="Title" name = "title">
				<button type="submit" name="titleSearch">Search</button>
			</form>
			
			<form method="POST" action="searchResults.php">
				<br>
				<h3>2) Category</h3>
				<select name="category">
					<option value="">--Please Select --</option>
					<option value="001">Health</option>
					<br>
					<option value="002">Business</option>
					<br>
					<option value="003">Biography</option>
					<br>
					<option value="004">Technology</option>
					<br>
					<option value="005">Travel</option>
					<br>
					<option value="006">Self-Help</option>
					<br>
					<option value="007">Cookery</option>
					<br>
					<option value="008">Fiction</option>
					<br>
				</select>
				<button type="submit" name="categorySearch">Search</button>
			</form>
			
			<form method="POST" action="searchResults.php">
				<br>
				<h3>3) Author</h3>
				<input type = "text" placeholder="Author" name = "author">
				<br>
				<button type="submit" name="authorSearch">Search</button>
			</form>
			
		</section>
	</section>

		<footer class="footer">
			<p>Website Created by Djibril Coulybaly - C18423664 &copy 2019.</p>
    </footer>
	</body>

</html>
