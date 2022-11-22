<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'phpmyadmin', 'llbook','llbook');

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtPhone = $_POST['txtPhone'];
$txtMessage = $_POST['txtMessage'];

// database insert SQL code
$sql = "INSERT INTO `demande` (`id`, `dateDemande`, `mail`, `nomClasse`, `nbLicence_Prof`, nbLicence_Prof) VALUES ('0', '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>