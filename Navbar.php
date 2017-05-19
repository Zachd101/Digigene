<?php
/*

You can include this in other files and the other file will get the css that is referenced here

hmm.. 

php sucks

*/


//Starting Session
session_start();

$username = $_SESSION['username'];

?>

<html>
<head>


	
<link rel="stylesheet" type="text/css" href="Digigene.css">

</head>
<body>

<ul>
  <a href="Home.php"> <img class="logo" style="float:left"; src="Dnaheart.png"> </a>
  <li><a href="Home.php"><b>Digigene</b></a></li>
  <li><a href="Matching.php">Matching</a></li>
  <li><a href="Help.php">Help</a></li>
  <li><a href="About.php">About</a></li>
  <li style="float:right"><a href="Profile.php?currentuser=<?php echo $username;?>"><?php echo $username; ?></a></li>
  <li style="float:right"><a href="Login.php">Log Out</a></li>
</ul>



</body>
</html> 
