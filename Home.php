<!DOCTYPE html>
<html>
<head>

	
<link rel="stylesheet" type="text/css" href="Digigene.css">

	
	

	<title>The Genodome</title>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a href="#about">About</a></li>
</ul>

	<?php


	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	?>

	<h1>Genodome</h1> 
	<h2>The Gene-Sequencing/Matching Website</h2>

	<p>Welcome to the genodome&nbsp<?php echo $username; ?>. This is your personal homepage tailored to you. Have fun reading other Gener's posts and looking for love in our fun, safe and genetically accurate website.</p>

</body>
</html> 
