<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 session_start();
 include "protect.php";
 if($_SESSION['utilisateur_login'] !== ""){
 $user = $_SESSION['utilisateur_login'];
 // afficher un message
 echo "Bonjour $user, vous êtes connecté";
 }
 ?>
 

 
 </div>
 </body>
</html>