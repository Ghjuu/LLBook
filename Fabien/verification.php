<?php
session_start();
if(isset($_POST['utilisateur_login']) && isset($_POST['utilisateur_mdp']))
{
 // connexion à la base de données
$dbhost = "localhost";
$dbuser = "phpmyadmin";
$dbpass = "llbook";
$dbname = "llbook";
 $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
 or die('could not connect to database');
 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $utilisateur_login = mysqli_real_escape_string($db,htmlspecialchars($_POST['utilisateur_login'])); 
 $utilisateur_mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['utilisateur_mdp']));
 
 if($utilisateur_login !== "" && $utilisateur_mdp !== "")
 {
 $requete = "SELECT count(*) FROM utilisateurs where 
 utilisateur_login = '".$utilisateur_login."' and utilisateur_mdp = '".$utilisateur_mdp."' ";
 $exec_requete = mysqli_query($db,$requete);
 $reponse = mysqli_fetch_array($exec_requete);
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['utilisateur_login'] = $utilisateur_login;
 header('Location: principale.php');
 }
 else
 {
 header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: login.php');
}
mysqli_close($db); // fermer la connexion


?>