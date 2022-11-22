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
$nom="SELECT nom_prof FROM professeur";
 
//PREPARATION ET EXECUTION DE LA REQUETE
$stmt = $pdo->prepare($nom);
$stmt->execute();

$var_nomProf = $_POST['var_nomProf'];
$var_classe = $_POST['var_classe'];
$var_ressource = $_POST['var_ressource'];


$sql = "INSERT INTO `demande` (`id`, `dateDemande`, `mail`, `statutDemande`, `nomClasse`, `nbLicence_Prof`, nbLicence_Prof) VALUES ('0', '', '$', '$', '$')";

$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}//
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
<select name="liste_nom">
        <?php
        //SCRIPT DE RETOUR DES ENREGISTREMENTS EN BDD
        while ($result = $stmt->fetch()) {
            echo '<option value="'.$result["nom_prof"].'">'.$result["nom_prof"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<label for="nom-classe"><FONT size="3pt" color="black" face="Arial Black">Selectionner la classe ou le groupe :</FONT></label>
<?php
$classe="SELECT nomClasse FROM classe";
$cla = $pdo->prepare($classe);
$cla->execute();
$groupe="SELECT nomGroupe FROM groupe";
$grp = $pdo->prepare($groupe);
$grp->execute();
?>

<select name="liste_groupe">
        <?php
        while ($result = $cla->fetch()) {
            echo '<option value="'.$result["nomClasse"].'">'.$result["nomClasse"].'</option>';
        }
        ?>
        <?php
        while ($result = $grp->fetch()) {
            echo '<option value="'.$result["nomGroupe"].'">'.$result["nomGroupe"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<label for="ressources"><FONT size="3pt" color="black" face="Arial Black">Selectionner la ressources :</FONT></label>
<?php
$ressources="SELECT intitulé FROM ressourcesNumerique";
$ress = $pdo->prepare($ressources);
$ress->execute();
?>
<select name="ressources">
        <?php
        while ($result = $ress->fetch()) {
            echo '<option value="'.$result["intitulé"].'">'.$result["intitulé"].'</option>';
        }
        ?>
    </select>
<br>
<br>
<div>
    <title>Donner la licence eleve a l'enseignant ?</title>
</head>
</div><FONT size="3pt" color="black" face="Arial Black">Donner la licence eleve a l'enseignant ?</FONT> <br>
<body>
<input type="checkbox" class="case" onClick="doAction()"> Oui
<br>
</body>
<br>
<button type="submit">Valider</button>
</form>
</body>
</CENTER>
</div>
</html>