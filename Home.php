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
      if ( is_array( $output )){
          $output = implode( ',', $output);
      }
      echo "<script>console.log('$output');</script>";
  }


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

	   <h4>Post: </h4>
	
      <form id="form" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

        <input type="text" id="content" name='content' placeholder="Content">

        <input type="submit" id="submit" name='submit'> 

      </form >

    </span class="float">



    <span>

      <h4>Search: </h4>

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


      //Making a new variable so I don't mess up content
      $string = $content;

      //String length
      $stringlen = strlen($string); 

      for($i = 0; $i < $stringlen; $i++){

          $char = substr($string, $i, 1);

          //If tag start is found
          if($char == "#"){

              debug_to_console("Tag Found");

              //Start of the tag 
              $start = $i;

              //If should keep looking for more tag
              $keepGoing = true;

              //Tag length while looking for the tag
              $tagLen = 1;

              while($keepGoing == true){

                  //Next char after start 
                  $tagChar = substr($string, $start + $tagLen, 1);

                  $tagChar2 = substr($string, $start + $tagLen + 1, 1);

                  //If tag end is found
                  if($tagChar == " " || $start + $tagLen >= $stringlen || $tagChar == "#"){

                      //END THE TAG

                      $tag = substr($string, $start, $tagLen);

                      debug_to_console("Tag Ended ". $tag);

                      //Break while loop
                      $keepGoing = false;

                  } else {

                      //Add one to the current tag length
                      $tagLen += 1; 
                      
                  }

              }

          }

      }   

   		
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
