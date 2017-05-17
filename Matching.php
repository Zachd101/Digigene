<?php

include 'Navbar.php';
session_start();


?>


<!DOCTYPE html>
<html>

<head>

    <title>Relationships</title>

</head>

<body>


    <h1>Matching</h1>


    <p>Try our patented matching software for free. It will match you with your perfect soulmate a guaranteed 100% of the time 50% of the time.</p>

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


    //Allows debugging
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output )){
            $output = implode( ',', $output);
        }
        echo "<script>console.log('$output');</script>";
    }    

    ?>
    
</body>



</html> 
