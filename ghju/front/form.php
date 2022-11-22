<?php

$con = mysqli_connect('localhost', 'phpmyadmin', 'llbook','llbook');


$now = 'NOW()'
$txtEmail = $_POST['txtEmail'];


$sql = "INSERT INTO `demande` (`id`, `dateDemande`, `mail`, `statutDemande`, `nomClasse`, 'nbLicence_Prof', 'nbLicence_Eleve') VALUES ('0', '$now', '$txtEmail', '$txtPhone', '$txtMessage')";
