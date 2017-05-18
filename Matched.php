<?php

session_start();
include 'Navbar.php';

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Congradulations</title>
    </head>

    <body>


        <br><br><br><br>


        <div class="bubble">

            <h1>Congradulations</h1>

            
        </div>

        <br>

        <div class="bubble">


            <?php


            if(isset($_GET['match'])){


                $_SESSION['matchuser'] = $_GET['match'];


            }


            ?>
            
            <p><?php echo $_SESSION['username']; ?> was matched with <?php echo $_SESSION['matchuser']; ?>, yey </p>
     
            
        </div>
        
    </body>

</html>
