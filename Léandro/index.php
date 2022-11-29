<?php
    //VARIABLES DE CONNEXION BDD
$dbhost = "localhost";
$dbuser = "phpmyadmin";
$dbpass = "llbook";
$dbname = "llbook";
$dbchar = "utf8";
 
 
//TENTATIVE DE CONNEXION PDO
try {
    $pdo = new PDO('mysql:host='."$dbhost".';dbname='."$dbname".';'."$dbuser","$dbuser","$dbpass", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$dbchar."'"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch (PDOException $e) {
    die($e->getMessage());
}

?>

<html>
    <div><b>Vous etes dans la 4eme dimension</b></div>
    <br><br>
    <button><a href="form.php" type="button">Formulaire de demande</button>
</html>