<?php
session_start();

include 'Navbar.php';
$username = $_SESSION['username'];
$password = $_SESSION['password'];


if(isset($_GET['currentuser'])){


$currentuser = $_GET['currentuser'];


} else {

$currentuser = $username;

}

?>


<html>

    <head>
        
	<title><?php echo $currentuser; ?></title>

    </head>
    <body>
        <br>
        <br>
        <br>
        <br>

        <div class="bubble">
            <h1> <?php echo $currentuser; ?></h1>
        </div>

        <br>

        <?php 

        //SETTING VARIABLES AND FUNCTIONS
        
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


        $query = "SELECT * FROM accounts WHERE username = '$currentuser' ORDER BY id DESC";

        // execute query
      	$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysqli_error());

        $row = mysqli_fetch_row($result);

        $bio = $row[3];

        $age = $row[4];

        $gender = $row[6];


        echo "<div class='bubble'>";

        echo "<h4>About $currentuser:</h4>";

        echo "<p>Bio: $bio</p>";

        echo "<p>Age: $age</p>";

        echo "<p>Gender: $gender</p>";
        
        echo "</div>";

        echo "<br>";


        //if post hasn't already been submitted 
	if(!isset($_POST['submit']) && $currentuser == $username){

        ?>
            
            <div class="bubble">


                <h4>Update Records: </h4>
                
                <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">


                    <input type="text" id="bio" name="bio" placeholder="bio">

                    <input type="text" id="gender" name="gender" placeholder="gender">

                    <input type="text" id="age" name="age" placeholder="age">

                    <input type="submit" id="submit" name="submit">

                    
                </form>

            </div>


        <?php

        } else {

            $bio = $_POST['bio'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];

            $query = "UPDATE accounts SET bio = '$bio', gender = '$gender', age = '$age' WHERE username = '$username'";
            
            // execute query
      	    $result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysqli_error());

            debug_to_console("Updated");

            $profilelink = "Profile.php?currentuser=" . $username;

        ?>
     	    <script type="text/javascript">

      
             
     	     window.open(<?php echo $profilelink; ?>, "_self");
     	    </script>

        <?php
        
        }

        //looking at all posts 
	$query = "SELECT * FROM posts WHERE username = '$currentuser'";

	//executing query
	$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error());

	// see if any rows were returned
	if (mysqli_num_rows($result) > 0) {

    	    // print them one after another
            echo "<br>";
            echo "<div class='bubble'>";
            echo "<h4>Posts:</h4>";
    	    echo "<table id='postTable' cellpadding=10 border=1>";
    	    echo "<tr> <th>Username</th> <th>Post</th> </tr>";

    	    while($row = mysqli_fetch_row($result)) {
        	echo "<tr>";
       		echo "<td>" . $row[1]."</td>";
       		echo "<td>".$row[2]."</td>";
       		echo "</tr>";
    	    }
	    echo "</table>";
            echo "</div>";

	    //If there were no rows to be printed
	} else {
   	    // print status message for no rows
   	    echo "No rows found!";
	}
        

       
        ?>    
</body>
</html>
