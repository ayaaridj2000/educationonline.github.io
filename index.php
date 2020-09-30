<?php
 // inisialiser la session
 session_start();
 // verification utilisateur connecteé sinon rediriger vers la page de login
 if (!isset($_SESSION["username"])){
   header("Location:login.php");
   exit();
 }
?>



<!DOCTYPE html >
<html>
<head>
<title>DJEMAI Example Frams</title>
 <!-- Include CSS File Here -->
 <link rel="stylesheet" href="MyCSS/bootstrap.css"/>
 <!-- Include JS File Here -->
 <script src="MyJS/jquery-3.5.1.min.js"></script>
 <script src="MyJS/bootstrap.min.js"></script>
</head>


<frameset cols="150,*" frameborder="0" border="0" framespacing="0">
	<frame name="menu" src="menu.html" marginheight="0" marginwidth="0" scrolling="auto" noresize>
	
  <frameset rows="62,*,40" frameborder="0" border="0" framespacing="0">
    <frame name="topNav" src="top_nav1.html">
    <frame name="content" src="content.html" marginheight="0" marginwidth="0" scrolling="auto" noresize>
    <frame name="footer" src="footer.html">
  </frameset>
 
  <noframes>
    <p> the users' browser doesn't support frames. </p>
  </noframes>

</frameset>

</html>