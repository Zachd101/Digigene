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
  <a href="Home"> <img class="logo" style="float:left"; src="Dnaheart.png"> </a>
  <li><a href="Home"><b>Digigene</b></a></li>
  <li><a href="Matching">Matching</a></li>
  <li><a href="Help">Help</a></li>
  <li><a href="About">About</a></li>
  <li style="float:right"><a href="Profile?currentuser=<?php echo $username;?>"><?php echo $username; ?></a></li>
  <li style="float:right"><a href="Login">Log Out</a></li>
</ul>



</body>
</html> 
