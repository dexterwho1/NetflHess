<?php
require_once "db.php";

unset($_SESSION['email']);
session_destroy();
header('location: connexion.php');

?>

