<?php
require_once "db.php";
session_start();
$req = $bdd->prepare('SELECT titre FROM film WHERE titre LIKE :titre OR realisateur like :titre');
$req->execute(array(
    ':titre' => '%' . $_POST['search'] . '%'
));
while ($donnee = $req->fetch()) {
    echo $donnee['titre'];
}
?>