<?php
include("formtest.php")
?>
<html>
    <head><title>Formulaire</title></head>
    <body>
    <h1>form !</h1>
        <h2>Completez :</h2>
        <form name="inscription" method="post" action="formtest.php">
            <input type="text" name="nom"/> <br/>
            <input type="text" name="mail"/> <br/>
            <input type="text" name="phone"/> <br/>
            <input type="text" name="mess"/> <br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
    if (isset ($_POST['valider'])){
        //On récupère les valeurs entrées par l'utilisateur :
        $nom=$_POST['nom'];
        $mail=$_POST['mail'];
        $phone=$_POST['phone'];
        $mess=$_POST['mess'];
        //On se connecte
        connectMaBase();

        if ($base->connect_error) {
            die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
          }
 
        //On prépare la commande sql d'insertion
        $sql = 'INSERT INTO test (" "," ","'.$mail.'","'.$phone.'","'.$mess.'") VALUES(" ","'.$nom.'","'.$mail.'","'.$phone.'","'.$mess.'")'; 
 

        $rs = mysqli_query($sql);

        if($rs)
            {
             	echo "Contact Records Inserted";
            }
        }
        ?>
    </body>
</html>
