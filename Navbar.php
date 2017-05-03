<html>
<head>

	
<link rel="stylesheet" type="text/css" href="Digigene.css">

	
</head>
<body>
 
 <button id="myBtn">Redirect</button>
  <script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
      document.location.href = 'http://www.google.com/';
    });
 
  </script>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a href="#about">About</a></li>
</ul>
<?php 

  //some conditions

  header("Location: http://www.google.com/");

?>

</body>
</html> 
