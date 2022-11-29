<!DOCTYPE html>
<html>
<link rel="stylesheet" href="demandes.css" media="screen" type="text/css" />
<head>
<center>
<h1><FONT face="Arial Black">Détail des demandes</FONT></h1>
<p><strong><FONT face="Arial Black">Vous pouvez consulter ici les ressources numériques</FONT></strong></p>
</center>
</head>
<br> 
<body>
    
        <?php
  try  //Connection a la bdd
  {
   $bdd = new PDO('mysql:host=localhost;dbname=llbook;charset=utf8', 'phpmyadmin', 'llbook');
  }
  catch (Exception $e)
  {
   die('Erreur : ' . $e->getMessage());
  }
  $reponse = $bdd->query('SELECT * FROM demande');

  echo '<center><div class="liste"><table>';
  echo '<tr>';

  echo "<table border='1'>\n";
  echo "<tr>\n";
  echo '<th bgcolor="#ff7f00">'."Numéro de la demande".'</th>';
  echo '<th bgcolor="#ff7f00">'."Date de la demande".'</th>';
  echo '<th bgcolor="#ff7f00">'."Nom du professeur".'</th>';
  echo '<th bgcolor="#ff7f00">'."Prénom du professeur".'</th>';
  echo '<th bgcolor="#ff7f00">'."Adresse e-mail".'</th>';
  echo '<th bgcolor="#ff7f00">'."Statut de la demande".'</th>';
  echo '<th bgcolor="#ff7f00">'."Nom de la classe".'</th>';
  echo '<th bgcolor="#ff7f00">'."Ressource".'</th>';
  echo '<th bgcolor="#ff7f00">'."Nombre de licence professeur".'</th>';
  echo '<th bgcolor="#ff7f00">'."Nombre de licence élève".'</th>';
  echo "</tr>\n";
  
  while($donnees = $reponse->fetch()) // Renvoit les valeurs de la bdd
  {    echo '<tr>';
    echo '<th bgcolor="#808080">'.$donnees["idDemande"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["dateDemande"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["nomProf"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["prenomProf"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["mail"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["statutDemande"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["nomClasse"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["ressource"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["nbLicence_Prof"].'</th>';
    echo '<th bgcolor="#808080">'.$donnees["nbLicence_Eleve"].'</th>';
    echo '</tr>'."\n";
  } 
  echo '</table></div></center>';
            $pdo = null;
        ?>
  
    <p>
      

    </body>

    
</html>