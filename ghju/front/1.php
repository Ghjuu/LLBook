<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$host="mysql";
$user="phpmyadmin";
$pass="llbook";
$base="llbook";
$table="professeur";

mysql_connect($host,$user,$pass);
mysql_select_db($base);

$reponse = mysql_query("SELECT * FROM `".$table."` ");

echo '<select name="myname">';

while ($donnees = mysql_fetch_array($reponse)){
echo '<option value="'.$donnees['VALEUR'].'">'.$donnees['VALEUR'].'</option>';
}

echo '</select>';


$con = mysqli_connect('localhost', 'phpmyadmin', 'llbook','llbook');

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtPhone = $_POST['txtPhone'];
$txtMessage = $_POST['txtMessage'];

// database insert SQL code
$sql = "INSERT INTO `test` (`id`, `nom`, `mail`, `phone`, `message`) VALUES ('0', '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

