<?php

//Starting Session
session_start();

?>

<html>
<head>

	
<link rel="stylesheet" type="text/css" href="Digigene.css">

	
</head>
<body>

<ul>
  <li><a class="active" href="http://localhost:8888/Digigene/Home.php">Home</a></li>
  <li><a href="http://localhost:8888/Digigene/Help.php">Help</a></li>
  <li><a href="http://localhost:8888/Digigene/About.php">About</a></li>
  <li style="float:right"><a href=""><?php echo $_SESSION['username'];?> </a></li>
  <li style="float:right"><a href="http://localhost:8888/Digigene/Login.php">Log Out</a></li>
</ul>


</body>
</html> 
