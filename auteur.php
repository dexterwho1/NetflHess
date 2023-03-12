<?php
require_once "db.php";

$req= $bdd->prepare('select realisateur from film ');
$req->execute(
);

while($donnee = $req->fetch()){
    echo $donnee['realisateur'];

}
?>

