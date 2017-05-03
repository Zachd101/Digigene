<?php 
session_start();

//Including Navbar
include 'Navbar.php'

?> 

<!DOCTYPE html>
<html>
<head>


	<title>The Genodome</title>
</head>
<body>

	<?php

	//Setting session variables to more useable names 
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	?>

	<h1>Genodome</h1> <h5> The Gene-Sequencing/Matching Website</h5>

	<p>Welcome to the genodome&nbsp<?php echo $username; ?>. This is your personal homepage tailored to you. Have fun reading other Gener's posts and looking for love in our fun, safe and genetically accurate website.</p>



</body>
</html>