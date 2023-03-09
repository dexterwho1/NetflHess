<?php
require_once "db.php";
session_start();
echo $_GET['id'];
$req= $bdd->prepare('delete  from panier  where id_utilisateur= :id');
$req->execute(array(
    ':id' =>$_GET['id']
));

header('location:panier.php');
?>
