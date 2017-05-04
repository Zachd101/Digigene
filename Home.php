<?php 
session_start();

//Including Navbar
include 'Navbar.php';

//Setting session variables to more useable names 
$username = $_SESSION['username'];
$password = $_SESSION['password'];

//Setting sql variables
$host = "localhost";

$user = "root";

$pass = "root";

$db = "digigene";

// open connection
$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

// select database
mysqli_select_db($connection,$db) or die ("Unable to select database!");

?> 

<!DOCTYPE html>
<html>

<head>

	<title>The Genodome</title>

</head>

<body>


	<h1>Genodome: Max Sucks at CSS</h1> <h5> The Gene-Sequencing/Matching Website</h5>

	<p>Welcome to the genodome&nbsp<?php echo $username; ?>. This is your personal homepage tailored to you. Have fun reading other Gener's posts and looking for love in our fun, safe and genetically accurate website.</p>

	<?php

	$content = $_POST['content'];

	if(!isset($_POST['submit'])){

	?>


	<p>Post: </p>
	
    <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

    <input type="text" name="content" placeholder="Content">

    <input type="submit" name="submit">

    </form>


	<?php
    
   	} else { 

   		echo "something happened";

   		$query = "INSERT INTO posts (username, content) VALUES ('$username', '$content')";

		// execute query
    	$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysqli_error());

    	?>
   			<script type="text/javascript">
   				window.open("http://localhost:8888/Digigene/Home.php", "_self");
   			</script>
    	
    	<?php 

   	}

	//looking at all posts 
	$query = "SELECT * FROM posts ORDER BY id DESC";

	//executing query
	$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

	// see if any rows were returned
	if (mysqli_num_rows($result) > 0) {

    	// print them one after another
    	echo "<table cellpadding=10 border=1>";
    	echo "<tr> <th>Username</th> <th>Post</th> </tr>";

    	while($row = mysqli_fetch_row($result)) {
        	echo "<tr>";
       		echo "<td>" . $row[1]."</td>";
       		echo "<td>".$row[2]."</td>";
       		echo "</tr>";
    	}
	    echo "</table>";

	} else {
   		// print status message
   		echo "No rows found!";
	}	

	mysqli_close($connection);

	?>

</body>
</html>