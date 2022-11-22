<?php
session_start();
if(login_user($utilisateur_login,$utilisateur_mdp)) { // Test les identifiant mot de passe 
    $_SESSION['is_logged_in'] = 1;
    header('Location: principale.php'); //redirection vers la page protégée
} else {
    $_SESSION['is_logged_in'] = 0;
    header('Location: error.php');
}

 ?>