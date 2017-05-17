<?php
session_start();

include 'Navbar.php';
 $username = $_SESSION['username'];
 $password = $_SESSION['password'];

?>


<html>

<head>
	<title><?php echo $username; ?></title>


</head>
<body>
<br>
<br>
<br>
<br>

<div class="bubble">
<h1> <?php echo $username; ?></h1>
</div>

</body>
</html>