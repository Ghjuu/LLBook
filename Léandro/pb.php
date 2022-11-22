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
 
//REQUETE SQL A EXECUTER
$sql="SELECT nom_prof FROM professeur";
 
//PREPARATION ET EXECUTION DE LA REQUETE
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<!-- Liste deroulante MYSQL des Quartier -->
<form method="post" action="liste.php">
    <select name="liste_nom">
        <?php
        //SCRIPT DE RETOUR DES ENREGISTREMENTS EN BDD
        while ($result = $stmt->fetch()) {
            echo '<option value="'.$result["nom_prof"].'">'.$result["nom_prof"].'</option>';
        }
        ?>
    </select>
</form>