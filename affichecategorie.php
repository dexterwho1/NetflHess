<?php
require_once "db.php";
session_start();

echo $_GET['id'];

$req =$bdd->prepare('Select titre from film where genre like :id');
$req->execute(array(
    ':id'=> '%'.$_GET['id'].'%'
));
$donnees = $req->fetchAll();

foreach ($donnees as $donnee) {
    echo '<a href="affichecategorie.php?id='.$donnee["titre"].'">'.$donnee["titre"].'</a>';
}
?>
