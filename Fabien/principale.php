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
 include "protect.php";
 session_start();
 if(!empty($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === 1) {
    echo 'zone protégée , vous êtes identifié';
} else {
    echo 'erreur vous devez être identifié';
}
 ?>
 
 </div>
 </body>
</html>