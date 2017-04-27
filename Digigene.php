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


		$mysqli = new mysqli("localhost", "root", "root", "Digigene");

		/* check connection */
		if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
		}

		// open connection
		$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

		// select database
		mysqli_select_db($connection,$db) or die ("Unable to select database!");

		$AccName = $_POST["AccName"]; 
		$Password = $_POST["Password"];

		echo $AccName, $Password;
		

		$sql = 'INSERT INTO Accounts (AccName, Password) 
		VALUES (AccName, Password)' ;

		if ($conn->query($sql) === TRUE) {
  		  echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


		// close connection
		mysqli_close($connection);

	?>
    
	</body>
</html>
