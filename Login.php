<?php 

//Starting Session
session_start();

$_SESSION['LoggedIn'] = False;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

    <link rel="stylesheet" type="text/css" href="Digigene.css">
</head>
<body>
<br>

<div class="bubble">

<?php

// form not submitted
if (!isset($_POST['submit'])) {

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
    
    //Searching for inputed username
    $query = "SELECT * FROM accounts WHERE username = '$username'";

    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

    //Fetching result of query
    $row = mysqli_fetch_row($result);

    //If username exists 
    if(mysqli_num_rows($result) > 0){

        //If password is right 
        if($row[2] == $password){

            //Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['LoggedIn'] = True;
            
            //Redirecting to Home page 
            ?>
            <script type="text/javascript">
                window.open("http://localhost:8888/Digigene/Home.php", "_self");
            </script>
            <?php 

        //If password is wrong 
        } else {
            echo "Password is wrong. Please try again.";
            echo '<a href="http://localhost:8888/Digigene/Login.php">Login</a>';

        }

    //If password doesn't exist
    } else {
        echo "That account doesn't exist";
    }
}

?>

<br>

<a href="http://localhost:8888/Digigene/Register.php">Register</a>

<br>

</div>


</body>
</html>