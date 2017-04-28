<?php 

session_start();

?>

<html>
<head>

	<style type="text/css">
		
		body {

			font-weight: normal;
			font-family: Tahoma, Geneva, sans-serif; 
			color: black;
		}


	</style>

</head>

<body>


<?php


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
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $isdone = False; 

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection,$db) or die ("Unable to select database!");
    

    $query = "SELECT * FROM `accounts` WHERE `username` LIKE '$username'";

    $result = mysqli_query($connection, $query) or die("Error in query: $query. ".mysqli_error());

    if(mysql_num_rows($result) < 1){
    	
	// create query
    $query = "INSERT INTO accounts(username, password) VALUES ('$username', '$password')";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());



    } else {
    
    	?> 
    	<script type="text/javascript"> 

    	window.open("http://localhost:8888/Digigene/TakenUsername.html", "_self");

    	</script>
    	<?php 

    }
 
     // close connection
    mysqli_close($connection);

    $isdone = True;

    if($isdone == True){

    ?> 

    <script type="text/javascript">
 
    	window.open("http://localhost:8888/Digigene/Home.php", "_self");

    </script>


    <?php 


	} else {

		unset($_POST['username']);
		unset($_POST['password']);
		unset($_POST['submit']);
	}
   
}


?>



</body>

</html>
