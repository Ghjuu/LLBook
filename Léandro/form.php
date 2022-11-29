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
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <div>
<CENTER><head>
    <link rel="stylesheet" href="form.css">
    <meta charset="utf-8">
    <br>
    <br>
    <br>
    <br>
    <br>
    <FONT size="25pt" color="orange" face="arial black">
    <u>LLBook</u></FONT>
    <br>
    <h2><FONT face="arial black"><u>Formulaire affectation des ressources numeriques</u></FONT></h2>
</head>
<br>
<body>
    <label for="nom-prof"><FONT size="3pt" color="black" face="Arial Black">Selectionner le nom de l'enseignant :</FONT></label>
<form method="post" action="form.php">


<select name="liste_nom" id='liste_nom'>
        <?php
        //REQUETE SQL A EXECUTER
        $nom="SELECT nom_prof FROM professeur";
 
        //PREPARATION ET EXECUTION DE LA REQUETE
        $stmt = $pdo->prepare($nom);
        $stmt->execute();
        //SCRIPT DE RETOUR DES ENREGISTREMENTS EN BDD
        while ($result = $stmt->fetch()) {
            echo '<option value="'.$result["nom_prof"].'">'.$result["nom_prof"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<label for="nom-classe"><FONT size="3pt" color="black" face="Arial Black">Selectionner la classe ou le groupe :</FONT></label>


<select name="liste_groupe" id='liste_groupe'>
        <?php
        $classe="SELECT nomClasse FROM classe";
        $cla = $pdo->prepare($classe);
        $cla->execute();
        while ($result = $cla->fetch()) {
            echo '<option value="'.$result["nomClasse"].'">'.$result["nomClasse"].'</option>';
        }
        ?>
        <?php
        $groupe="SELECT nomGroupe FROM groupe";
        $grp = $pdo->prepare($groupe);
        $grp->execute();
        while ($result = $grp->fetch()) {
            echo '<option value="'.$result["nomGroupe"].'">'.$result["nomGroupe"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<label for="ressources"><FONT size="3pt" color="black" face="Arial Black">Selectionner la ressources :</FONT></label>

<select name="ressources" id='ressources'>
        <?php
        $ressources="SELECT intitulé FROM ressourcesNumerique";
        $ress = $pdo->prepare($ressources);
        $ress->execute();
        while ($result = $ress->fetch()) {
            echo '<option value="'.$result["intitulé"].'">'.$result["intitulé"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<div>
</div><FONT size="3pt" color="black" face="Arial Black">Donner la licence eleve a l'enseignant ?</FONT> <br>
<input type="checkbox" class="case" onClick="doAction()"> Oui
<br>
    <p><input type="submit" name="submit" id="submit" value="Valider"/>
</form>
<?php
$liste_nom = $_POST['liste_nom'];
$liste_groupe = $_POST['liste_groupe'];
$ressources = $_POST['ressources'];

$date= date("y.m.d");

$sql = "INSERT INTO `demande` ('idDemande', `dateDemande`, `nomProf`, 'prenomProf', 'mail', `statutDemande`, `nomClasse`, `ressource`, 'nbLicence_Prof', 'nbLicence_Eleve') VALUES (' ', '$date', '$liste_nom', ' ', ' ', 'En attente', '$liste_groupe', '$ressources', '1' , ' ')";
?>
</body>
</CENTER>
</div>
</html>