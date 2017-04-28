<html>

<head>

	<style type="text/css">
		
		body {

			font-weight: normal;
			font-family: Tahoma, Geneva, sans-serif; 
			word-spacing: 10px;
			color: black;
		}


	</style>

</head>

<body>


<?php

include "Home.php";


if (!isset($_POST['submit'])) {

// form not submitted

?>

	<p>Register: </p>

    <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

    <input type="text" name="username" placeholder="Username">

    <input type="text" name="password" placeholder="Password">

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
    $isdone = False; 

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection,$db) or die ("Unable to select database!");
    

    // create query
    $query = "INSERT INTO accounts (username, password) VALUES ('$username','$password')";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

 
     // close connection
    mysqli_close($connection);

    $isdone = True;


    if($isdone == True){
    	header("http://localhost:8888/Digigene/Home.php");
    	exit();

    }

   



   
}


	

?>



</body>

</html>
