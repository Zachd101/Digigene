<html>

<head>

<basefont face="Arial">

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection,$db) or die ("Unable to select database!");
    

    // create query
    $query = "INSERT INTO accounts (username, password) VALUES ('$username','$password')";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

    // print message with ID of inserted record

    echo "New record inserted with ID " . mysqli_insert_id($connection);




     // close connection
    mysqli_close($connection);

   
}

?>


<script type="text/javascript">



	function ResetForm(){

		document.getElementById("form").reset();
	}



</script>

</body>

</html>
