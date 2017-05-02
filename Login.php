<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php

include 'Navbar.php';

if (!isset($_POST['submit'])) {

// form not submitted

?>

	<p>Login: </p>

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

    $row = mysqli_fetch_row($result);

    if(mysqli_num_rows($result) > 0){

        if($row[2] == $password){
            
            ?>

            <script type="text/javascript">
 
                window.open("http://localhost:8888/Digigene/Home.php", "_self");

            </script>

            <?php 

        } else {
            echo "wrong password";
        }

    } else {
        echo "That account doesn't exist";
    }
}

?>

<br>

<a href="http://localhost:8888/Digigene/Register.php">Register</a>


</body>
</html>