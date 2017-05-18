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
<?php 
	// open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection,$db) or die ("Unable to select database!");
	
	$query = "INSERT INTO accounts(bio, age, disease, gender) VALUES ('$bio', '$age','$disease','$gender')";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());
 
     // close connection
    mysqli_close($connection);

 


?>
</body>
</html>