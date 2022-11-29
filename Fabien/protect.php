<?php
session_start();
if (!isset($_SESSION['utilisateur_login'])) {
  header("location: acces_interdit.php");
  exit;
}
session_write_close();

 ?>