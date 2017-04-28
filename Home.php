<?php 
session_start();

?> 

<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
		
		body {

			font-weight: normal;
			font-family: Tahoma, Geneva, sans-serif; 
			color: black;
		}


	</style>

	<title>The Genodome</title>
</head>
<body>

	<?php


	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	?>

	<h1>Genodome</h1>

	<p>Welcome to the genodome&nbsp<?php echo $username; ?>. This is your personal homepage tailored to you. Have fun reading other Gener's posts and looking for love in our fun, safe and genetically accurate website.</p>



</body>
</html>