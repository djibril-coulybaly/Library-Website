<?php
require_once "db.php";

//Login Session 
if (isset($_POST['Sign-In']) && isset($_POST['username']) && isset($_POST['password'])) 
{
	session_start(); 
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	

	if (!empty($username) AND !empty($password)) 
	{
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
		$rows = mysqli_num_rows($results);
	  
		if ($rows == 1)
		{ 
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			header('Location:account.php');
		}
		else
		{
			header('Location:login.html');
		}	  
	}
	else
	{
		echo "<p>The Username/Password is required in order to continue<p>";
	}
}
?>                        