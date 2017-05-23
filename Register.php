<?php 

//Starting Session
session_start();

$_SESSION['LoggedIn'] = False;

?>

<html>
<head>

    <link rel="stylesheet" type="text/css" href="Digigene.css">

    <title>Register</title>


</head>

<body>
<br>


<?php


if (!isset($_POST['submit'])) {

// form not submitted

?>

<div class="bubble">    

    <h2>Become a Gener</h2>    

	<h4>Register: </h4>

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
    $_SESSION['LoggedIn'] = True;

    //Redirecting to Home page
    ?>
    <script type="text/javascript">
    	window.open("http://localhost:8888/Digigene/Home", "_self");
    </script>
    <?php 

   }
}


?>

<a id="Button" href="http://localhost:8888/Digigene/Login.php">Login</a>

</div>

</body>

</html>
