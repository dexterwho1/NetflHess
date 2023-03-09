<?php
require_once "db.php";
session_start();
echo $_GET['id'];
$req= $bdd->prepare('delete  from film join panier on film.id=panier.id_film where id_utilisateur=:id');
$req->execute(array(
    ':id_utilisateur' =>$_SESSION['email']
));

header('location:panier.php');
?>
