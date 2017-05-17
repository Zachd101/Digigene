<?php

session_start();
include 'Navbar.php';

?>


<!DOCTYPE html>
<html>
    
    <head>

        <title>Relationships</title>

    </head>

    <body>

        <br><br><br><br>

        <div class="bubble">
        
        <h1>Matching</h1>

        </div>

        <br>
        <div class="bubble">

            <p>Try our patented matching software for free. It will match you with your perfect soulmate a guaranteed 100% of the time, 50% of the time.</p>


        <?php


        //Setting sql variables
        $host = "localhost";

        $user = "root";

        $pass = "root";

        $db = "digigene";

        // open connection
        $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

        // select database
        mysqli_select_db($connection,$db) or die ("Unable to select database!");

        //Setting session variables to more useable names 
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        
        //Allows debugging with console
        function debug_to_console( $data ) {
            $output = $data;
            if ( is_array( $output )){
                $output = implode( ',', $output);
            }
            echo "<script>console.log('$output');</script>";
        }    


        //looking at all usernames 
	$query = "SELECT * FROM accounts ORDER BY id DESC";

	//executing query
	$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

	// see if any rows were returned
	if (mysqli_num_rows($result) > 0) {

    	    // print them one after another
            echo "<br>";
    	    echo "<table id='userTable' cellpadding=10 border=1>";
    	    echo "<tr> <th>Username</th> <th>Splice</th> </tr>";

    	    while($row = mysqli_fetch_row($result)) {
        	echo "<tr>";
       		echo "<td>" . $row[1]."</td>";
                echo "<td><a href=".$_SERVER['PHP_SELF']."?id=".$row[0].">Request A Match</a> </td>";
       		echo "</tr>";
    	    }
	    echo "</table>";
            echo "</div>";

	    //If there were no rows to be printed
	} else {
   	    // print status message for no rows
   	    echo "No rows found!";
	}	

        //If request a match link was pressed
        if (isset($_GET['id'])) {

            //Add match to matching table

            /*

               - Add new table into database for requests (2 columns, From and To)
               - Show all requests that are To user, if a request is reciprocated (they both request each other), create the match
               - Maybe list of potential matches should show bio in the table, would look better if each table cell was separated from each other(like cards in materialize BUT NOT MATERIALIZE.) 

               
             */
           


            
            // reset the url to remove id $_GET variable
	    $location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
	    exit;
	    

        }
        
        ?>
    
</body>
</html> 
