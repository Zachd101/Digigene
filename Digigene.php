<html>
	<body>
    
    <!-- This is the HTML form -->

   	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    	Account Name: <input type="text" name="AccName">
    	Password: <input type="text" name="Password">
    	<input type="submit" name="submit">
    </form>

	<?php

		// set database server access variables:
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$db = "Digigene";

		// open connection
		$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

		// select database
		mysqli_select_db($connection,$db) or die ("Unable to select database!");

		// create query
		$query = "SELECT * FROM symbols";

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
				echo "<td><a href=".$_SERVER['PHP_SELF']."?id=".$row[0].">Delete</a></td>";
        		echo "</tr>";
    		}
		    echo "</table>";

		} else {
			
    		// print status message
    		echo "No rows found!";
		}

		// free result set memory
		mysqli_free_result($result);

		$AccName = $_POST["AccName"]; 
		$Password = $_POST["Password"];


		echo $AccName;
		



		// close connection
		mysqli_close($connection);

	?>
    
	</body>
</html>
