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
  <img class="logo" style="float:left"; src="Dnaheart.png">
  <li><a href="http://localhost:8888/Digigene/Home.php">Genodome</a></li>
  <li><a href="http://localhost:8888/Digigene/Help.php">Help</a></li>
  <li><a href="http://localhost:8888/Digigene/About.php">About</a></li>
  <li style="float:right"><a href=""><?php echo $_SESSION['username'];?> </a></li>
  <li style="float:right"><a href="http://localhost:8888/Digigene/Login.php"><?php if($_SESSION['LoggedIn'] == True){ echo "Log out";} else { echo "Login";} ?></a></li>
</ul>



</body>
</html> 
