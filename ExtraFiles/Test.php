<html>
	<body>


	CHEATER

	<?php

		// set database server access variables:
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$db = "digigene";

		// open connection
		$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

		// select database
		mysqli_select_db($connection,$db) or die ("Unable to select database!");

		// create query
		$query = "SELECT * FROM accounts";

		// execute query
		$result = mysqli_query($connection, $query) or die ("Error in query: $query. " . mysqli_error());

		// see if any rows were returned
		if (mysqli_num_rows($result) > 0) {

    		// print them one after another
    		echo "<table cellpadding=10 border=1>";
    		while($row = mysqli_fetch_row($result)) {
        		echo "<tr>";
			echo "<td>".$row[0]."</td>";
        		echo "<td>" . $row[1]."</td>";
        		echo "<td>".$row[2]."</td>";
			echo "<td><a href=".$_SERVER['PHP_SELF']. "?id=".$row[0].">Delete</a> </td>";
        		echo "</tr>";
    		}
		    echo "</table>";

		} else {
			
    		// print status message
    		echo "No rows found!";
		}

		// free result set memory
		mysqli_free_result($result);
		
		// if DELETE pressed, set an id, if id is set then delete it from DB
		if (isset($_GET['id'])) {

			// create query to delete record
			echo $_SERVER['PHP_SELF'];
    		    $query = "DELETE FROM accounts WHERE id = ".$_GET['id'];

			// run the query
     		    $result = mysqli_query($connection,$query) or die ("Error in query: $query. " . mysqli_error());
			
		    // reset the url to remove id $_GET variable
		    $location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
		    exit;
			
		}
		
		// close connection
		mysqli_close($connection);

	?>
    
	</body>
</html>

