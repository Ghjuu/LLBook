<?php
// Connexion à la base de données
// -----------------------------------
//DB PARAMS
$dbhost = 'localhost';
$dbuser = 'phpmyadmin';
$dbpass = 'llbook';
$dbname = 'llbook';
$dbchar = 'utf8';
// -----------------------------------
//CONNEXION PDO
try {
    $pdo = new PDO('mysql:host='."$dbhost".';dbname='."$dbname".';'."$dbuser","$dbuser","$dbpass", array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,		// rapport d'erreurs sous forme d'exceptions
        PDO::ATTR_PERSISTENT => true, 					// Connexions persistantes
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$dbchar."'"	// encodage
    ));
 
} catch (PDOException $e) {
    die($e->getMessage());
}