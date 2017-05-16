<?php 

  //Including Navbar
  include 'Navbar.php';
  session_start();

  if($_SESSION['LoggedIn'] == False){

    ?>
    <script type="text/javascript">
      window.open("http://localhost:8888/Digigene/Login.php", "_self");
    </script>
    <?php 

  }

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

  //Allows debugging
  function debug_to_console( $data ) {
      $output = $data;
      if ( is_array( $output ) )
          $output = implode( ',', $output);

      echo "<script>console.log('$output');</script>";
  }

  debug_to_console("Test");

?> 

<!DOCTYPE html>
<html>

<head>

	<title>The Genodome</title>


</head>

<body>

<br><br><br><br>

  <div id="homeTitle" class="bubble">

	 <h1>Digigene: Your Personal Nightmare</h1> <h5> The Gene-Sequencing/Matching Website</h5>

	 <p>Welcome to the genodome&nbsp<?php echo $username; ?>. This is your personal homepage tailored to you. Have fun reading other Gener's posts and looking for love in our fun, safe and genetically accurate website. If you want to learn more, head to our About Page. If you need help go to our Help page. You can always return here if you click the Digigene logo on the navbar</p>

   <br>

  </div>
	<?php
	
	
	//if post hasn't already been submitted 
	if(!isset($_POST['submit'])){

	?>

  <br>

  <div class="bubble">

    <span class="float">

	   <p>Post: </p>
	
      <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

        <input type="text" id="content" name='content' placeholder="Content">

        <input type="submit" id="submit" name='submit'> 

      </form >

    </span class="float">



    <span >

      <p>Search: </p>

      <input id="searchBar" class="side" placeholder="Search Posts" onkeyup="filterPost()">

    </span>
    


	<?php
    
	//if post has been submitted 
   	} else { 


      // getting post data 
      $content = $_POST['content'];

      ///GET HASHTAGS WORKING HERE (ITS NOT WORKING)  

      /*

        - Loop through content (see if there is extended for loop in php - no $char=  stuff) 
        - Find hashtag, the word directly after should be added to the tags column 
        - See if there is array value so that multiple tags can be added to the same post

      */

      //getting length of content to loop through
      $strlength = strlen($content);

      //looping through content 
      for($i = 0; $i <= $strlen; $i++ ){
      
        $char = substr($content, $i, 1 );

        //If current character is a hashtag
        if($char == "#"){

          debug_to_console("Hashtag found ");
          $stop = true; 
          $z = 0;

          //looping through word after it
          while($stop){

            $tagchar = substr( $content, $i + $z, 1 );
            // If the character is a space (end the tag)
            if($tagchar == " "){

              

              //ADD THE TAG TO THE STR ARRAY 
              $tag = substr($content, $i, $z);

              $content = $tag;

              //stopping while loop
              $stop = false;

            } else {
              //add one to number of chars past the hastag
              $z += 1;
            }
          }
        }
      } 

     ///HASTAGS
   		
  		//creating query 
     		$query = "INSERT INTO posts (username, content) VALUES ('$username', '$content')";

  		// execute query
      	$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysqli_error());

      	?>
  			//refreshing page
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

	//closing connection after everything is displayed (fine to close connection because submitting the form refreshes the php) 
	mysqli_close($connection);

	?>

</body>

<script type="text/javascript">
	
function filterPost() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchBar");
  filter = input.value.toUpperCase();
  table = document.getElementById("postTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}


</script>

</html>