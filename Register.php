<?php 

//Starting Session
session_start();

?>

<html>
<head>


</head>

<body>


<?php

//Including the Navbar
include 'Navbar.php';

if (!isset($_POST['submit'])) {

// form not submitted

?>

	<p>Register: </p>

    <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

    <input type="text" name="username" placeholder="Username">

    <input type="password" name="password" placeholder="Password">

    <input type="submit" name="submit">

    </form>

<?php


}

else {

// form submitted

// set server access variables

    $host = "localhost";

    $user = "root";

    $pass = "root";

    $db = "digigene";

    // get form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection,$db) or die ("Unable to select database!");
    

    $query = "SELECT * FROM accounts WHERE username = '$username'";

    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

    //If username returns any results - already a username with that name
    if (mysqli_num_rows($result) > 0){

    	echo "That username is already taken";

    //If there were no results returned - username is open for the taking
    } else {
    	
	// create query
    $query = "INSERT INTO accounts(username, password) VALUES ('$username', '$password')";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());
 
     // close connection
    mysqli_close($connection);

    //Setting Session Variables 
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    //Redirecting to Home page
    ?>
    <script type="text/javascript">
    	window.open("http://localhost:8888/Digigene/Home.php", "_self");
    </script>
    <?php 

   }
}


?>

<a href="http://localhost:8888/Digigene/Login.php">Login</a>

</body>

</html>
