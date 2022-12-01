<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Novella - Register Page</title>
		<link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	</head>

	<body>
		<section id="centerArea">
			<section class="Content">
				<h2>Register for a My Novella Account</h2>
				
				<img src="Assets/Images/my_logo.png" alt="Novella Logo"/>
			
			<br>
			
				<?php
				require_once "db.php";
				if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['pwdConfirm']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['addressLine1']) && isset($_POST['addressLine2']) && isset($_POST['city']) && isset($_POST['telephone']) && isset($_POST['mobile']) )
				{
					// Declaring and Initializing variables from the registration form
					$uname = $_POST['username'];
					$pwd = $_POST['password'];
					$pc = $_POST['pwdConfirm'];
					$fname = $_POST['firstName'];
					$lname = $_POST['lastName'];
					$add1 = $_POST['addressLine1'];
					$add2 = $_POST['addressLine2'];
					$c = $_POST['city'];
					$tel = $_POST['telephone'];
					$mob = $_POST['mobile'];
					
					$usernameCheck = "SELECT * FROM user WHERE UserName='$uname'";
					$results = mysqli_query($db, $usernameCheck);
					$table = mysqli_num_rows($results);
					
					// Error checking the form to make sure it complies with the specifications given
					if($uname == '' || $pwd == '' || $fname == '' || $pc == '' || $lname == '' || $add1 == '' || $add2 == '' || $c == '' || $tel == '' || $mob == '')
					{
						echo "<p class='error'>All fields must be filled in order to continue</p>";
					}
					else if($table > 0)
					{
						echo "<p class='error'>The user name that you have entered is already taken! Please enter a new username</p>";
					}
					else if(strlen($pwd) > 6)
					{
						echo "<p class='error'>The password that you have entered is greater that 6! Please enter a password with 6 or less characters</p>";
					}
					else if($pwd != $pc)
					{
						echo "<p class='error'>The password that you have entered does not match! Please try again</p>";
					}
					else if(!is_numeric($mob))
					{
						echo "<p class='error'>This mobile number is not a number! Please enter a valid mobile number</p>";
					}
					else if(strlen($mob) > 10)
					{
						echo "<p class='error'>The mobile number that you have entered is greater that 10! Please enter a mobile number with 10 or less digits</p>";
					}
					else
					{
						$sql = "INSERT INTO user (UserName, Password, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$uname', '$pwd', '$fname', '$lname', '$add1', '$add2', '$c', '$tel', '$mob')";
						// Inserting the user's details into the database and displaying a confirmation message 
						// to the user with a link to return to the login page
						mysqli_query($db, $sql);
						echo '<p>Congratulations! Your account was created successfully. Click <a href="login.html">here</a> to log into My Novella Account</p>';
					}
				}
				?>
				<form method="POST">
					<input type = "text" placeholder="Username" name = "username">
					<br><br>
					<input type = "password" placeholder="Password" name = "password">
					<br><br>
					<input type = "password" placeholder="Confirm Password" name = "pwdConfirm">
					<br><br>
					<input type = "text" placeholder="First Name" name = "firstName">
					<br><br>
					<input type = "text" placeholder="Last Name" name = "lastName">
					<br><br>
					<input type = "text" placeholder="Address Line 1" name = "addressLine1">
					<br><br>
					<input type = "text" placeholder="Address Line 2" name = "addressLine2">
					<br><br>
					<input type = "text" placeholder="City" name = "city">
					<br><br>
					<input type = "text" placeholder="Telephone" name = "telephone">
					<br><br>
					<input type = "text" placeholder="Mobile" name = "mobile">
					<br><br>
					<button type="submit">Register</button>
				</form>
				<p>Already have an Novella account yet? <a href="login.html">Sign in here!</a></p>	
			</section>
		</section>
	</body>
</html>
